<?php

require "./components/user.php";

// echo "<pre>";
// print_r($_POST);
// Array
// (
//     [oldpass] => oldpassword
//     [npass] => newpassword
//     [cpass] => repeat
// )

$user_id = $_SESSION['user_id'];

$user = find('user', $user_id);

// Array
// (
//     [id] => 14
//     [name] => user here
//     [email] => user@user.com
//     [password] => $2y$10$0s73U8a1JQ8ZknbSr/ABduxeXDaf1/K9UPDrfP1w0woFQ6SEnQsMC
//     [role] => user
//     [phone] => 9700000100
// )

$old_pass = request('oldpass');

$new_pass = request('npass');

$re_pass = request('cpass');

if (!password_verify($old_pass, $user['password'])) {
    setError('Password Incorrect!!');
    header('Location: ./changepass.php');
    die;
}

if (!validatePassword($new_pass)) {
    setError("Please choose a strong password!!");
    header('Location: ./changepass.php');
    die;
}

if ($new_pass != $re_pass) {
    setError('Password not matched!!');
    header('Location: ./changepass.php');
    die;
}

if (!empty($old_pass) && !empty($new_pass) & !empty($re_pass) && ($new_pass == $re_pass)) {
    update('user', $user_id, [
        'password' => password_hash($new_pass, PASSWORD_DEFAULT)
    ]);
    setSuccess('Password Changed!!');
    header('Location: ./changepass.php');
    die;
}
