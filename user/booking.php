<?php
require "../functions/db.php";
require "../functions/functions.php";

check_user();

//user id 
$user_id = $_SESSION['user_id'];


//show id from ticket GET method
$show_id = request('sid');
//hall id form ticket GET method
// $hall_id = request('hid');

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

//total price from POST
$total_price = $unit_price * $booked_seat;

$status = 'pending';

if (!empty($user_id) && !empty($show_id) && !empty($total_tickets) && !empty($unit_price) && !empty($booked_seat) && !empty($total_price)) {

    create('booking', compact('user_id', 'show_id', 'total_tickets', 'unit_price', 'status', 'booked_seat', 'total_price'));

    setSuccess('Make payement to confirm booking!!');
    header("Location: ./payment.php?");
    die;
} else {
    setError("fill all the fields!!");
    header("Location: ./payment.php?");
    die;
}
