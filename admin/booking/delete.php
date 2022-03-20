<?php

require "../components/admin.php";

//this is booking id
$id = request('id');

$booking = find('booking', $id);

// Array
// (
//     [id] => 7
//     [user_id] => 14
//     [show_id] => 8
//     [total_tickets] => 95
//     [unit_price] => 400
//     [status] => pending
//     [booked_seat] => 5
//     [total_price] => 2000
// )

$payment = where('payment', 'booking_id', '=', $booking['id'], false);
// Array
// (
//     [id] => 3
//     [booking_id] => 7
//     [amount] => 2000
//     [payment_on] => 2022-03-20
// )

$payment_id = $payment['id'];

if (!empty($id) && !empty($payment_id)) {
    delete('booking', $id);
    delete('payment', $payment_id);
    setSuccess('Booking Deleted Successfully');
    header("Location: ./index.php");
    die;
}
