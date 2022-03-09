<?php

require "../components/admin.php";

$id = request('id');

if (empty($id)) {
    setError("Please provide ID");
    header("Location: index.php");
    die;
}

$genre = find('genre', $id);
if (empty($genre)) {
    setError("Enter a valid id!!!");
    header("Location: inedx.php");
    die;
}


delete('genre', $id);

setSuccess('Movie Genre deleted!');
header("Location: index.php");
