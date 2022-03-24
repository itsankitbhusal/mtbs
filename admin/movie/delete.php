<?php

require "../components/admin.php";

$id = request('id');

$movie = find('movie', $id);
if (empty($id)) {
    setError("Please provide ID");
    header("Location: index.php");
    die;
}

if (empty($movie)) {
    setError("Enter a valid id!!!");
    header("Location: index.php");
    die;
}

if (!empty($movie) && !empty($id)) {

    delete('movie', $id);
    $to_delete = "../../uploads/" . $movie['image'];
    $to_delete_cover = "../../cover/" . $movie['image_cover'];
    unlink($to_delete);
    unlink($to_delete_cover);

    setSuccess('Movie deleted!');
    header("Location: index.php");
    die;
} else {
    setError("Movie deletion failed");
    header("Location: index.php");
    die;
}
