<?php

require "../components/admin.php";

$id = request('id');

if (empty($id)) {
    setError('Enter a id!!');
    header('Location: ./index.php');
    die;
}

$hall = find('hall', $id);
if (empty($hall)) {
    setError("Enter a valid id!!");
    header('Location: ./index.php');
    die;
}

if (!empty($id)) {

    delete('hall', $id);

    setSuccess('Cinema Hall deleted!!');
    header("Location: ./index.php");
    die;
}
