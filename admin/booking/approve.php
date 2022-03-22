<?php

require_once __DIR__ . "/../components/admin.php";

//booking id
$booking_id = request('id');
if (empty($booking_id)) {
    setError("Please Provide an ID!!");
    header("Location: ./index.php");
    die;
}

//find all booking info 
$result = find('booking', $booking_id);



//id of user who have done booking
$result_id = $result['user_id'];

//finding name and email of user who have done booking
$user_result = find('user', $result_id);

//name
$user_name = $user_result['name'];

//email
$user_email = $user_result['email'];


if (empty($result)) {
    setError('Error Occured!!');
    header("Location: ./index.php");
    die;
}
// Array
// (
//     [id] => 6
//     [user_id] => 14
//     [show_id] => 8
//     [total_tickets] => 100
//     [unit_price] => 400
//     [status] => pending
//     [booked_seat] => 5
//     [total_price] => 2000
// )

//no. of booked seat
$booked_seat = $result['booked_seat'];

//total price
$total_price = $result['total_price'];

if (empty($booked_seat)) {
    setError('Error Occured!!');
    header("Location: ./index.php");
    die;
}
//show id
$show_id = $result['show_id'];


if (empty($show_id)) {
    setError('Error Occured!!');
    header("Location: ./index.php");
    die;
}

//find show detials
$show = find('shows', $show_id);

$show_time = $show['play_date'] . ' & ' . $show['play_time'];

if (empty($show)) {
    setError('Error Occured!!');
    header("Location: ./index.php");
    die;
}

// Array
// (
//     [id] => 8
//     [hall_id] => 4
//     [movie_id] => 16
//     [play_date] => 2022-03-09
//     [play_time] => 11:15:00
//     [ticket_price] => 400
// )

//find hall id from shows
$hall_id = $show['hall_id'];


if (empty($hall_id)) {
    setError('Error Occured!!');
    header("Location: ./index.php");
    die;
}

//finding hall detials
$hall = find('hall', $hall_id);


if (empty($hall)) {
    setError('Error Occured!!');
    header("Location: ./index.php");
    die;
}

// Array
// (
//     [id] => 4
//     [name] => CinemaTIC
//     [total_seats] => 100
// )

//find total seats of hall
$total_seats_hall = $hall['total_seats'];


if (empty($total_seats_hall)) {
    setError('Error Occured!!');
    header("Location: ./index.php");
    die;
}

//we need to decrease seats in the hall table and booking table
//this already checked during the booking
// $updated_tickets = $total_seats_hall - $booked_seat;


// if (empty($updated_tickets)) {
//     setError('Error Occured!!');
//     header("Location: ./index.php");
//     die;
// }

$booking_status = where('booking', 'status', '=', 'pending', false);

if ($booking_status) {
    // update('booking', $booking_id, [
    //     'total_tickets' => $updated_tickets,
    //     'status' => 'booked',
    // ]);

    // update('hall', $hall_id, [
    //     'total_seats' => $updated_tickets,
    // ]);


    $payment = where('payment', 'booking_id', '=', $booking_id, false);
    $payment_on = $payment['payment_on'];
    update('booking', $booking_id, [
        'status' => 'booked',
    ]);
    require_once __DIR__ . "/../../functions/invoice.php";
    setSuccess('Booking has been Approved!');
    header("Location: ./index.php");
    die;
} else {
    setError('Seat Aleady booked!!');
    header("Location: ./index.php");
    die;
}
