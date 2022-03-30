<?php

require_once "./functions/db.php";
require_once "./functions/functions.php";
require_once "./functions/validation.php";
// echo "<pre>";
// print_r($_POST);
// Array
// (
//     [name] => ankit bhusal
//     [email] => ankitbhusal95@gmail.com
//     [subject] => random
//     [message] => sjdasdjaksdj askd asdj alkda sdlk asd
// )

$name = strip_tags(request('name'));
$email = strip_tags(request('email'));
$subject = strip_tags(request('subject'));
$message = strip_tags(request('message'));

if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    setError("Please fill all the fields!!");
    header("Location: ./contact.php");
    die;
}
if (!validateName($name)) {
    setError('Please enter valid name!!');
    header("Location: ./contact.php");
    die;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setError("Please enter valid email!!");
    header("Location: ./contact.php");
    die;
}
if (!validateName($subject)) {
    setError("Please enter valid subject!!");
    header("Location: ./contact.php");
    die;
}

$to = 'cinematic@mtbs.com';

// Additional headers
$headers = "From: $email";

// mail input form to admin
if (mail($to, $subject, $message, $headers)) {
    setSuccess("Email sent!!");
    header("Location: ./contact.php");
    die;
} else {
    setError('Email sent failed!');
    header("Location: ./contact.php");
    die;
}
