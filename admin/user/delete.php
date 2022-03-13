<?php

require "../components/admin.php";

$id = request('id');

if (empty($id)) {
    setError("Please provide ID");
    Header("Location: index.php");
}

$user = find('user', $id);
if (empty($user)) {
    setError("Enter a valid id!!!");
    Header("Location: index.php");
}

if (!empty($user) && !empty($id)) {
    delete('user', $id);
    setSuccess('User deleted!');
    header("Location: index.php");
} else {
    setError("User deletion failed");
    Header("Location: index.php");
}
