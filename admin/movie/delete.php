<?php

require "../components/admin.php";

$id = request('id');

if (empty($id)) {
    die("Please provide ID");
}

$movie = find('movie', $id);
if (empty($movie)) {
    die("Enter a valid id!!!");
}

$movie = find('movie', $id);
delete('movie', $id);
$to_delete = "../../uploads/" . $movie['image'];
unlink($to_delete);

setSuccess('Movie deleted!');
header("Location: index.php");
