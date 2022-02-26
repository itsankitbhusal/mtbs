<?php

require_once __DIR__ . "/../components/admin.php";
// $id = request('id');
// $movie = find('movie', $id);

// echo '<pre>';
// echo $movie['image'] . "<br>";
// print_r($_POST);
// die;

//grab update filds data
$id = request('id');
$movie = find('movie', $id);
if (!$movie) {
    die("Provide movie ID");
}

$image = $_FILES['image'];

$name = request('name');
$language = request('language');
$release_date = request('release_date');

//movie genre
$list = request('genre');
if (empty($list)) {
    die("Please choose an genre");
}
//runtime
$runtime = request('runtime');

//fetch row from movie where id is $id
$movie = find('movie', $id);

if (empty($image)) {
}
$uploaded = is_uploaded_file($_FILES['image']['tmp_name']);
//if movie is uploaded tha only movie image into folder
if ($uploaded) {
    //image 
    $file = $image['tmp_name'];
    $type = mime_content_type($file);
    $size = $image['size'];

    if ($type != "image/png" && $type != "image/jpeg") {
        die("File must be an image");
    }
    $mb_size = $size / 1024 / 1024;

    if ($mb_size > 5) {
        die("File should be less than 5 MB");
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




//update query in movie table
if (!empty($name) && !empty($language) && !empty($release_date) && !empty($runtime)) {
    update('movie', $id, compact('name', 'language', 'release_date', 'image', 'runtime'));
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
    die("Please fill all the fields!!!");
}
