<?php
require_once __DIR__ . "/../components/admin.php";
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

    //runtime
    $runtime = request('runtime');

    //image
    if (empty($_FILES['image']) || $_FILES['image']['error'] != 0) {

        $file = $_FILES['image']['tmp_name'];
        $type = mime_content_type($file);
        $size = $_FILES['image']['size'];

        if ($type != "image/png" && $type != "image/jpeg") {
            die("File must be an image");
        }
        $mb_size = $size / 1024 / 1024;

        if ($mb_size > 2) {
            die("File should be less than 2 MB");
        }
        $uname = uniqid();

        $ext = match ($type) {
            "image/png" => ".png",
            "image/jpeg" => ".jpeg",
        };

        $file_name = $uname . $ext;

        $image = $file_name;
    }
    if (!empty($name) && !empty($language) && !empty($release_date) && !empty($runtime)) {
        move_uploaded_file($file, "../../uploads/$file_name");
        create('movie', compact('name', 'language', 'release_date', 'image', 'runtime'));
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
        die("Please fill all the fields!!");
    } else {
        die("Please fill all the fields");
    }
}
