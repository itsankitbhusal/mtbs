<?php
require "./functions/db.php";
require "./functions/functions.php";
if (!empty($_POST)) {
    $email = request("email");
    $password = request("password");
    $user = where('user', 'email', '=', $email, false);
    if (empty($user)) {
        setError('No user found with given email address');
        Header('Location: login.php');
    }

    if (empty($email) || empty($password)) {
        setError("Please fill all the fields");
        Header('Location: login.php');
    }

    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        if ($user['role'] == "admin") {
            header("Location: ./admin/index.php");
            setSuccess('Admin login Successfully');
        } elseif (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            if ($user['role'] == "user") {
                header("Location: ./index.php");
                setSuccess('User Logged In Successfully');
            }
        } else {
            setError('Invalid username or password!');
            header("Location: login.php");
        }
    } else {
        setError("Invalid email or password");
        Header('Location: login.php');
    }
}
