<?php
require "./components/user.php";

check_user();

//user id 
$user_id = $_SESSION['user_id'];


//show id from ticket GET method
$show_id = request('sid');
//hall id form ticket GET method
// $hall_id = request('hid');

if (empty($show_id)) {
    setError('Please enter valid id!!');
    header('Location: ./index.php');
    die;
}

//total seats
$total_tickets = request('tt');

//unit price from ticket GET method
$unit_price = request('price');

$booked_seat = request('booked_seats');
if ($booked_seat > 5) {
    setError("You cannot book more than 5 seats!!");
    $url = './ticket.php?id=' . $show_id;
    header('Location: ' . $url);
    die;
}

// counting tootal number of seats booked by user for a single show
$total_tickets_db = query("SELECT sum(booked_seat) FROM booking WHERE (user_id = $user_id AND show_id = $show_id)");
$db_seat = $total_tickets_db[0]['sum(booked_seat)'];

if (($db_seat + $booked_seat) > 5) {
    setError("You cannot book more than 5 seats for a particular show!!");
    header('Location: ./index.php');
    die;
}

//total price from POST
$total_price = $unit_price * $booked_seat;

$status = 'pending';

if (!empty($user_id) && !empty($show_id) && !empty($total_tickets) && !empty($unit_price) && !empty($booked_seat) && !empty($total_price)) {

    create('booking', compact('user_id', 'show_id', 'total_tickets', 'unit_price', 'status', 'booked_seat', 'total_price'));

    setSuccess('Make payement to confirm booking!!');
    $booking_id = query('SELECT `id` FROM `booking` ORDER BY id DESC LIMIT 1');
    $id = $booking_id[0]['id'];
    // echo '<pre>';
    // print_r($id);
    // die;
    $uul = './payment.php?id=' . $id;
    header("Location: $uul");
    die;
} else {
    setError("fill all the fields!!");
    $url = 'ticket.php?id=' . $show_id;
    header("Location: $url");
    die;
}
