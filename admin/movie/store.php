<?php
require_once __DIR__ . "/../components/admin.php";
echo "<pre>";



//file upload or not validation
$uploaded = is_uploaded_file($_FILES['image']['tmp_name']);
if (!$uploaded) {
    die('Please upload an image');
}
if (!empty($_POST)) {
    $name = request('name');
    $language = request('language');
    $release_date = request('release_date');

    //movie genre
    $list = request('genre');
    $genre = implode(",", $list);
    //runtime
    $hh = request('hh');
    $mm = request('mm');
    $ss = request('ss');
    //image
    $file = $_FILES['image']['tmp_name'];
    $type = mime_content_type($file);
    $size = $_FILES['image']['size'];

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

    if (!empty($image) && !empty($name) && !empty($language) && !empty($release_date) && !empty($genre) && !empty($hh) && !empty($mm)) {
        move_uploaded_file($file, "../../uploads/$file_name");
        create('movie', compact('name', 'language', 'release_date', 'genre', 'image', 'hh', 'mm', 'ss'));
        setSuccess('Data Inserted Sucessfully');
        header("Location: index.php");
        die("Please fill all the fields!!");
    } else {
        die("Please fill all the fields");
    }
}
