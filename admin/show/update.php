<?php
require_once __DIR__ . "/../components/admin.php";

$id = request('id');

if (empty($_POST['hall_id']) || empty($_POST['movie_id']) || empty($_POST['play_date']) || empty($_POST['play_time']) || empty($_POST['ticket_price'])) {
    setError('Please fill all the fields!!');
    header("Location: edit.php");
}

if (!empty($_POST)) {
    $hall_id = request('hall_id');
    $movie_id = request('movie_id');
    $play_date = request('play_date');
    $play_time = request('play_time');
    $ticket_price = request('ticket_price');


    if (!empty($hall_id) && !empty($movie_id) && !empty($play_date) && !empty($play_time) && !empty($ticket_price)) {
        update('shows', $id, compact('hall_id', 'movie_id', 'play_date', 'play_time', 'ticket_price'));
        setSuccess('Data Updated Sucessfully');
        header("Location: index.php");
    }
}