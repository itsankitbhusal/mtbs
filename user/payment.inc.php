<?php
require "./components/user.php";

$booking = query('SELECT * FROM booking ORDER BY id DESC LIMIT 1', false);
$booking_id = $booking['id'];

$amount = $booking['total_price'];


$name = request('name_on_card');

if (!validateName($name)) {
    setError("Please enter a valid name!!");
    header("Location: ./payment.php");
    die;
}


$card = request('card_number');

if (!validateNumber($card)) {
    setError('Please Enter valid card number!!');
    header("Location: ./payment.php");
    die;
}

$exp = request('exp_date');


$cvv = request('cvv');


if (empty($cvv)) {
    setError("Please provide all the details!!");
    header("Location: ./payment.php");
    die;
}

if (strlen($cvv) > 3) {
    setError("Please enter valid CVV!!");
    header("Location: ./payment.php");
    die;
}
$exists = where('payment', 'booking_id', '=', $booking_id, false);

if ($exists > 5) {
    setError("You cannot Book more than 5 seats!!");
    header("Location: ../index.php");
    die;
}

if (!empty($name) && !empty($card) && !empty($exp) && !empty($cvv)) {

    create('payment', [
        'booking_id' => $booking_id,
        'amount' => $amount,
        'payment_on' => date('Y-m-d')
    ]);

    setSuccess("Payment Successful!!");
    header("Location: ../index.php");
    die;
}
