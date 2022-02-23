<?php

require_once __DIR__ . "/../components/admin.php";


if (!empty($_POST)) {



    //image 


    $name = request('moviename');
    $language = request('language');
    $release_date = request('release_date');

    $genre = request('genre');
    $hh = request('hh');
    $mm = request('mm');
    $ss = request('ss');

    //image validation starts;
    //cann't check if image isnot uploaded and shows php error
    // if (empty($_FILES['photo']) && empty($_FILES['photo']['name'])) {
    //     die('Please upload and image');
    // }
    $file = $_FILES['image']['tmp_name'];
    $type = mime_content_type($file);
    $size = $_FILES['image']['size'];

    $images = [
        'image/png',
        'image/jpeg',
    ];

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

    move_uploaded_file($file, "../../uploads/$file_name");

    $image = $file_name;

    if (!empty($image) && !empty($name) && !empty($language) && !empty($release_date) && !empty($genre) && !empty($hh) && !empty($mm) && !empty($ss)) {

        create('movie', compact('name', 'language', 'release_date', 'genre', 'image', 'hh', 'mm', 'ss'));

        setSuccess('Data Inserted Sucessfully');
        header("Location: create.php");
        die("Please fill all the fields!!");
    } else {
        setError("Please fill all the fields");
        header("Location: create.php");
        die;
    }
}
