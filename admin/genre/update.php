<?php
require_once __DIR__ . "/../components/admin.php";

$id = request('id');
$name = request('name');

if (empty($id)) {
    die("Please provide ID");
}

$genre = find('genre', $id);

if (empty($name)) {
    setError("Please fill all the fiels!");
    header("Location: index.php");
    die;
}

update('genre', $id, compact('name', 'description'));

setSuccess('Genre data updated!');
header("Location: index.php");
