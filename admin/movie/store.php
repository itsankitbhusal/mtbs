<?php
require_once __DIR__ . "/../components/admin.php";
//file upload or not validation
$uploaded = is_uploaded_file($_FILES['image']['tmp_name']);
$cover = is_uploaded_file($_FILES['cover']['tmp_name']);
if (!$uploaded) {
    setError('Please upload an image');
    header("Location: create.php");
    die;
}
if (!$cover) {
    setError('Please upload an cover image');
    header("Location: create.php");
    die;
}
if (!empty($_POST)) {
    $name = request('name');
    $language = request('language');
    $release_date = request('release_date');

    //movie genre
    $list = request('genre');

    //runtime
    $runtime = request('runtime');

    //image
    $uploaded = is_uploaded_file($_FILES['image']['tmp_name']);
    if ($uploaded) {

        $file = $_FILES['image']['tmp_name'];
        $type = mime_content_type($file);
        $size = $_FILES['image']['size'];

        if ($type != "image/png" && $type != "image/jpeg") {
            setError("File must be an image");
            Header("Location: create.php");
            die;
        }
        $mb_size = $size / 1024 / 1024;

        if ($mb_size > 2) {
            setError("File should be less than 2 MB");
            Header("Location: create.php");
            die;
        }
        $uname = uniqid();

        $ext = match ($type) {
            "image/png" => ".png",
            "image/jpeg" => ".jpeg",
        };

        $file_name = $uname . $ext;

        $image = $file_name;
    }
    // for cover image
    if ($cover) {

        $file_cover = $_FILES['cover']['tmp_name'];
        $type_cover = mime_content_type($file);
        $size_cover = $_FILES['cover']['size'];

        if ($type_cover != "image/png" && $type_cover != "image/jpeg") {
            setError("File must be an image");
            header("Location: create.php");
            die;
        }
        $mb_size_cover = $size / 1024 / 1024;

        if ($mb_size > 5) {
            setError("File should be less than 5 MB");
            header("Location: create.php");
            die;
        }
        $uname_cover = uniqid();

        $ext_cover = match ($type_cover) {
            "image/png" => ".png",
            "image/jpeg" => ".jpeg",
        };

        $file_name_cover = $uname_cover . $ext_cover;

        $image_cover = $file_name_cover;
    }
    if (!empty($name) && !empty($language) && !empty($release_date) && !empty($runtime)) {
        //    for movie image
        move_uploaded_file($file, "../../uploads/$file_name");

        //for movie cover
        move_uploaded_file($file_cover, "../../cover/$file_name_cover");
        create('movie', compact('name', 'language', 'release_date', 'image', 'image_cover', 'runtime'));
        //fetch recently added movie (above line) and storing in vairable $movie
        $movie = query('SELECT * FROM movie ORDER BY id DESC LIMIT 1', false);
        //foreach loop for adding more than one genre in databse
        foreach ($list as $genre) {
            create('genre_movie', [
                'genre_id' => $genre,
                'movie_id' => $movie['id'],
            ]);
        }
        setSuccess('Data Inserted Sucessfully');
        header("Location: index.php");
        die;
    } else {
        setError("Please fill all the fields");
        header("Location: create.php");
        die;
    }
}
