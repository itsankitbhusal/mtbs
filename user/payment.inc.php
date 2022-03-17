<?php
require "../functions/db.php";
require "../functions/functions.php";
require "../functions/validation.php";

$booking = query('SELECT * FROM booking ORDER BY id DESC LIMIT 1', false);
$booking_id = $booking['id'];

$amount = $booking['total_price'];


$name = request('name_on_card');

if (!validateName($name)) {
    die("Please enter a valid name!!");
}


$card = request('card_number');

if (!validateNumber($card)) {
    die('Please Enter valid card number!!');
}

$exp = request('exp_date');


$cvv = request('cvv');

if (strlen($cvv) > 3) {
    die("Please enter valid CVV!!");
}
$exists = where('payment', 'booking_id', '=', $booking_id, false);

if ($exists) {
    die("Paymemt Already done!!");
}

if (!empty($name) && !empty($card) && !empty($exp) && !empty($cvv)) {

    create('payment', [
        'booking_id' => $booking_id,
        'amount' => $amount,
        'payment_on' => date('Y-m-d')
    ]);

    die("Payment Successful!!");
}
