<?php
require "../functions/db.php";
require "../functions/functions.php";

check_user();
//getting user id from session
$user_id = $_SESSION['user_id']; //user id
$id = request('id'); //show id

//get hall data having id of hall
$hall = find('shows', $id);
echo "<pre>";
$hall_id =  $hall['hall_id'];

//get total seats (Array )
$total_seats = query('select `total_seats` from `hall` where id =' . $hall_id, false);

//total no of seats
$seats = $total_seats['total_seats'];

//find price of a specific movie (Array)
$ticket_price = query('select `ticket_price` from `shows` where id =' . $id, false);

//actual price
$price = $ticket_price['ticket_price'];


// user_id -> user_id --> from session --> done
// show_id -> show_id --> from shows table -> done
// total_tickets -> -------  --> seats --> done
// unit_price -> ------- -->  price --> done
// status -> pending/booked;
