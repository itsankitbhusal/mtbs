<?php
require_once __DIR__ . "/../components/admin.php";

$id = request('id');



$name = request('name');
$total_seats = request('total_seats');

if (empty($id)) {
    die("Please provide ID");
}

$hall = find('hall', $id);
if (empty($name) || empty($total_seats)) {
    setError("Please fill all the fiels!");
    header("Location: index.php");
    die;
}

if ($total_seats < 10) {
    setError("Total seats should be more than 10");
    header("Location: index.php");
    die;
}





update('hall', $id, compact('name', 'total_seats'));

setSuccess('Hall data updated!');
header("Location: index.php");
