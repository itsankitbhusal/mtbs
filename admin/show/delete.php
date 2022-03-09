<?php

require "../components/admin.php";

$id = request('id');

if (empty($id)) {
    setError("Please provide ID");
    Header("Location: index.php");
}

$shows = find('shows', $id);
if (empty($shows)) {
    setError("Enter a valid id!!!");
    Header("Location: index.php");
}

if (!empty($shows) && !empty($id)) {
    delete('shows', $id);
    setSuccess('Show deleted!');
    header("Location: index.php");
} else {
    setError("Show deletion failed");
    Header("Location: index.php");
}
