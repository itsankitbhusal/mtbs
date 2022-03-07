<?php

require "../components/admin.php";

$id = request('id');

if (empty($id)) {
    setError("Please provide ID");
    Header("Location: index.php");
}

$movie = find('movie', $id);
if (empty($movie)) {
    setError("Enter a valid id!!!");
    Header("Location: index.php");
}

if (!empty($movie) && !empty($id)) {
    $movie = find('movie', $id);
    delete('movie', $id);
    $to_delete = "../../uploads/" . $movie['image'];
    $to_delete_cover = "../../cover/" . $movie['image_cover'];
    unlink($to_delete);
    unlink($to_delete_cover);

    setSuccess('Movie deleted!');
    header("Location: index.php");
} else {
    setError("Movie deletion failed");
    Header("Location: index.php");
}
