<?php
require_once __DIR__ . "/../components/admin.php";


if (empty($_POST['hall_id']) || empty($_POST['movie_id']) || empty($_POST['play_date']) || empty($_POST['play_time']) || empty($_POST['ticket_price'])) {
    setError('Please fill all the fields!!');
    header("Location: ./create.php");
}

if (!empty($_POST)) {
    $hall_id = request('hall_id');
    $movie_id = request('movie_id');
    $play_date = request('play_date');
    $current_date = date('Y-m-d');
    $play_time = request('play_time');
    $ticket_price = request('ticket_price');

    // check if same show with date and time already exists
    $sql = "SELECT * FROM shows WHERE hall_id = $hall_id AND movie_id = $movie_id AND play_date = '$play_date' AND play_time = '$play_time'";

    $is_already_exists = query($sql);
    // echo "<pre>";
    // print_r($is_already_exists);
    // die;

    if ($is_already_exists) {
        setError('Show already exists!!');
        header("Location: ./create.php");
        die;
    }

    if (!validateNumber($ticket_price)) {
        setError("Enter valid price!!");
        header("Location: create.php");
        die;
    }

    if ($current_date >= $play_date) {
        setError("Play date must be grater than current date!!");
        header("Location: create.php");
        die;
    }

    if (!empty($hall_id) && !empty($movie_id) && !empty($play_date) && !empty($play_time) && !empty($ticket_price)) {


        create('shows', [
            'hall_id' => $hall_id,
            'movie_id' => $movie_id,
            'play_date' => $play_date,
            'play_time' => $play_time,
            'ticket_price' => $ticket_price
        ]);

        setSuccess('Data Inserted Sucessfully');
        header("Location: index.php");
        die;
    } else {
        setError("Please fill all the fields");
        header("Location: create.php");
        die;
    }
}
