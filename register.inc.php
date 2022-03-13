<?php
require "./functions/db.php";
require "./functions/functions.php";

$name = request("name");
$email = request("email");
$password = request("password");
$password_verify = request("password_verify");

if (empty($email) || empty($password) || empty($name) || empty($password_verify)) {
    setError("Please fill all the fields");
    Header("Location: ./register.php");
}
$user = where('user', 'email', '=', $email, false);
if ($user) {
    setError("Email has alreday been taken!");
    Header("Location: ./register.php");
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setError('Please enter valid email');
    Header("Location: ./register.php");
}
if ($password != $password_verify) {
    setError("Password and Confirm password doesnot match!");
    Header("Location: ./register.php");
}

if (strlen($password) < 6) {
    setError("Password must be 6 character or more");
    Header("Location: ./register.php");
}

if (!empty($name) && !empty($email) && !empty($password)) {
    create('user', [
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);
    setSuccess("User Registerd");
    Header("Location: ./index.php");
}
