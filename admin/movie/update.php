<?php

require_once __DIR__ . "/../components/admin.php";

//grab update filds data
$id = request('id');
$movie = find('movie', $id);
if (!$movie) {
    setError("Provide movie ID");
    Header("Location: ./edit.php");
}

$image = $_FILES['image'];

$name = request('name');
$language = request('language');
$release_date = request('release_date');

//movie genre
$list = request('genre');
if (empty($list)) {
    setError("Please choose an genre");
    Header("Location: ./edit.php");
}
//runtime
$runtime = request('runtime');

//fetch row from movie where id is $id
$movie = find('movie', $id);


$uploaded = is_uploaded_file($_FILES['image']['tmp_name']);
$cover = is_uploaded_file($_FILES['image_cover']['tmp_name']);

//if movie is uploaded tha only movie image into folder
if ($uploaded) {
    //image 
    $file = $image['tmp_name'];
    $type = mime_content_type($file);
    $size = $image['size'];

    if ($type != "image/png" && $type != "image/jpeg") {
        setError("File must be an image");
    }
    $mb_size = $size / 1024 / 1024;

    if ($mb_size > 5) {
        setError("File should be less than 5 MB");
    }
    $uname = uniqid();

    $ext = match ($type) {
        "image/png" => ".png",
        "image/jpeg" => ".jpeg",
    };

    $file_name = $uname . $ext;
    $image = $file_name;

    move_uploaded_file($file, "../../uploads/$file_name");
    $to_delete = "../../uploads/" . $movie['image'];
    unlink($to_delete);
} else {
    $image = $movie['image'];
}
if ($cover) {
    //image 
    $file_cover = $image['tmp_name'];
    $type_cover = mime_content_type($file_cover);
    $size_cover = $image['size'];

    if ($type_cover != "image/png" && $type_cover != "image/jpeg") {
        setError("File must be an image");
    }
    $mb_size = $size / 1024 / 1024;

    if ($mb_size > 5) {
        setError("Cover should be less than 5 MB");
    }
    $uname_cover = uniqid();

    $ext_cover = match ($type_cover) {
        "image/png" => ".png",
        "image/jpeg" => ".jpeg",
    };

    $file_name_cover = $uname_cover . $ext_cover;
    $image_cover = $file_name_cover;

    move_uploaded_file($file, "../../cover/$file_name_cover");
    $to_delete_cover = "../../cover/" . $movie['image_cover'];
    unlink($to_delete_cover);
} else {
    $image_cover = $movie['image_cover'];
}




//update query in movie table
if (!empty($name) && !empty($language) && !empty($release_date) && !empty($runtime)) {
    update('movie', $id, compact('name', 'language', 'release_date', 'image', 'image_cover', 'runtime'));
    query('delete from genre_movie where movie_id = ' . $id);
    foreach ($list as $genre) {
        create('genre_movie', [
            'genre_id' => $genre,
            'movie_id' => $movie['id'],
        ]);
    }

    setSuccess('Data Updated Sucessfully');
    header("Location: index.php");
} else {
    setError("Please fill all the fields!!!");
    header("Location: edit.php");
}
