<?php
require_once __DIR__ . "/../components/admin.php";

$id = request('id');

if (empty($id)) {
    setError("Please provide ID");
    header('Location: index.php');
    die;
}

$name = request('name');
$total_seats = request('total_seats');

$result = all('hall');
foreach ($result as $r) {
    if ($r['name']  == $name && $r['total_seats'] == $total_seats) {
        setError("Hall already added!");
        header("Location:  index.php");
        die;
    }
}

if (!validateName($name)) {
    setError("Please provide valid name!");
    header("Location:  index.php");
    die;
}
if (!validateNumber($total_seats)) {
    setError("Please provide valid seats!");
    header("Location:  index.php");
    die;
}
if (empty($name) || empty($total_seats)) {
    setError("Please fill all the fields!");
    header("Location:  index.php");
    die;
}
if ($total_seats < 20) {
    setError("Total seats should be more than 20");
    header("Location: index.php");
    die;
}

$hall = find('hall', $id);

if (!empty($hall)) {
    update('hall', $id, compact('name', 'total_seats'));
    setSuccess('Hall data updated!');
    header("Location: index.php");
    die;
} else {
    setError("Some error occured!!");
    header("Location: index.php");
    die;
}
