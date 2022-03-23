<?php
require_once "db.php";

// multiple recipients
$to  = $user_email; // note the comma

// subject
$subject = 'Invoice';

// message
$message = '
    <p style="font-size:20px;margin-left:30%;color:#55BEC7;">' . $user_name . '</p>
    <p style="margin-left:30%"> Your Invoice, </p>


    <table style="width:100%;display: flex;
justify-content: center;">

        <tbody>
            <tr>
                <td style="padding-bottom: 3%;">Show Time:</td>
                <td style="padding-bottom: 3%;padding-left: 10%;">' . $show_time . '</td>
            </tr>
            <tr>
                <td style="padding-bottom: 3%;">Booking Status:</td>
                <td style="padding-bottom: 3%;padding-left: 10%;">Booked</td>
            </tr>
            <tr>
                <td style="padding-bottom: 3%;">Payment On:</td>
                <td style="padding-bottom: 3%;padding-left: 10%;">' . $payment_on . '</td>
            </tr>
            <tr>
                <td style="padding-bottom: 3%;">Booked Seats</td>
                <td style="padding-bottom: 3%;padding-left: 10%;">' . $booked_seat . '</td>
            </tr>
            <tr>
                <td style="padding-bottom: 3%;">Total Price</td>
                <td style="padding-bottom: 3%;padding-left: 10%;color:#FF8D58;">' . $total_price . '</td>
            </tr>
        </tbody>
    </table>
    ';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

// Additional headers
$headers .= "To: $to" . "\r\n";
$headers .= "From: CinemaTic <cinematic@mtbs.com>" . "\r\n";


// Mail it
if (mail($to, $subject, $message, $headers)) {
    setSuccess("Email sent!!");
} else {
    setError('Email sent failed!');
}
