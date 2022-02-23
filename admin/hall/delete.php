<?php

require "../components/admin.php";

$id = request('id');
$name = request('name');

if (empty($id)) {
    die("Please provide ID");
}

$hall = find('hall', $id);
if (empty($hall)) {
    die("Enter a valid id!!!");
}


delete('hall', $id);

setSuccess('Cinema Hall deleted!');
header("Location: index.php");
