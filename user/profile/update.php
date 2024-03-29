<?php

require "./components/user.php";
// echo "<pre>";
// print_r($_POST);
// die;
// Array
// (
//     [name] => user
//     [email] => user@user.com
//     [phone] => 9800000000
// )

$user_id = $_SESSION['user_id'];

$name = request('name');

$email = request('email');

$phone = request('phone');

if (empty($name) || empty($email) || empty($phone)) {
    setError("Please fill all the fields!!");
    header("Location: ./index.php");
    die;
}

if (!validatePhone($phone)) {
    setError("Enter valid phone!!");
    header("Location: ./index.php");
    die;
}

if (!validateName($name)) {
    setError("Enter valid name!!");
    header("Location: ./index.php");
    die;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setError('Please enter valid email');
    Header("Location: ./index.php");
    die;
}
if (!empty($name) && !empty($email) && !empty($phone)) {

    update('user', $user_id, compact('name', 'email', 'phone'));
    setSuccess('Data updated successfully');
    Header("Location: ./index.php");
    die;
}
