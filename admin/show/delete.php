<?php

require "../components/admin.php";

$id = request('id');

if (empty($id)) {
    setError("Please provide ID");
    header("Location: index.php");
    die;
}

$shows = find('shows', $id);
if (empty($shows)) {
    setError("Enter a valid id!!!");
    header("Location: index.php");
    die;
}

if (!empty($shows) && !empty($id)) {
    delete('shows', $id);
    setSuccess('Show deleted!');
    header("Location: index.php");
    die;
} else {
    setError("Show deletion failed");
    header("Location: index.php");
    die;
}
