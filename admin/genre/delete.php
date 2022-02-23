<?php

require "../components/admin.php";

$id = request('id');

if (empty($id)) {
    die("Please provide ID");
}

$genre = find('genre', $id);
if (empty($genre)) {
    die("Enter a valid id!!!");
}


delete('genre', $id);

setSuccess('Movie Genre deleted!');
header("Location: index.php");
