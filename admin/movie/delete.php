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


delete('movie', $id);

setSuccess('Movie deleted!');
header("Location: index.php");
