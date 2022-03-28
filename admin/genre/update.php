<?php
require_once __DIR__ . "/../components/admin.php";

$id = request('id');
$name = request('name');
$result = all('genre');

foreach ($result as $r) {
    if ($r['name']  == $name) {
        setError("Genre already added!");
        header("Location:  index.php");
        die;
    }
}
if (!validateGenre($name)) {
    setError("Please provide valid genre!");
    header("Location:  index.php");
    die;
}

if (empty($id)) {
    setError("Please provide an id!");
    header("Location: index.php");
    die;
}

$genre = find('genre', $id);

if (empty($name)) {
    setError("Please fill all the fields!");
    header("Location: index.php");
    die;
}

if (!empty($name) && !empty($genre)) {

    update('genre', $id, compact('name', 'description'));

    setSuccess('Genre data updated!');
    header("Location: index.php");
}
