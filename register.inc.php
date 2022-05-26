<?php
require "./functions/db.php";
require "./functions/functions.php";
require "./functions/validation.php";

$name = request("name");
$email = request("email");
$password = request("password");
$phone = request("phone");
$password_verify = request("password_verify");
if (empty($email) || empty($password) || empty($name) || empty($password_verify)) {
    setError("Please fill all the fields");
    Header("Location: ./register.php");
    die;
}

if ($password != $password_verify) {
    setError("Password and Confirm password don't  match!");
    Header("Location: ./register.php");
    die;
}
if (!validateName($name)) {
    setError("Enter valid name!!");
    header("Location: ./register.php");
    die;
}

if (!validatePhone($phone)) {
    setError("Enter valid phone!!");
    header("Location: ./register.php");
    die;
}

$user = where('user', 'email', '=', $email, false);
if ($user) {
    setError("Email has already  been taken!");
    Header("Location: ./register.php");
    die;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setError('Please enter valid email');
    Header("Location: ./register.php");
    die;
}
if (!validatePassword($password)) {
    setError('Enter strong password');
    Header("Location: ./register.php");
    die;
}

$user_phone = where('user', 'phone', '=', $phone, false);
if ($user_phone) {
    setError("Phone has alreday been taken!");
    Header("Location: ./register.php");
    die;
}
if (!empty($name) && !empty($email) && !empty($password) && !empty($phone) && ($password == $password_verify)) {
    create('user', [
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'phone' => $phone
    ]);
    setSuccess("User Registerd");
    Header("Location: ./index.php");
    die;
}
