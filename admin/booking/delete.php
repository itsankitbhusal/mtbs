<?php

require "../components/admin.php";

//booking id from GET
$id = request('id');

$user_id = $_SESSION['user_id'];
//find email from user table using $user_id 
$user_email = find('user', $user_id)['email'];


$booking = find('booking', $id);

// if booking is not found
if (!$booking) {
    setError('Booking not found');
    header('Location: index.php');
    die;
}

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

if (!empty($id)) {

    // check if booking table status is booked using $id as booking id
    $booking_status = find('booking', $id)['status'];
    // delete code
    delete('booking', $id);

    if ($booking_status != 'booked') {
        $to = $user_email;
        $from = "admin@cinematic.com";
        $subject = "Booking Cancelled";
        $message = "Your Booking has been cancelled!!";
        $headers = "From: $from";
        mail($to, $subject, $message, $headers);
    }
    setSuccess('Booking Deleted Successfully');
    header("Location: ./index.php");
    die;
}
if (!empty($payment_id)) {
    delete('payment', $payment_id);
    setSuccess('Booking Deleted Successfully');
    header("Location: ./index.php");
    die;
}
