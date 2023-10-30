<?php
include "../url.php";

function redirect($url)
{
    header("Location: /mtbs/$url");
    die;
}

function setSuccess($text)
{
    $_SESSION['success'] = $text;
}

function hasSuccess()
{
    return !empty($_SESSION['success']);
}

function getSuccess()
{
    $msg = $_SESSION['success'] ?? '';
    unset($_SESSION['success']);
    return $msg;
}

function setError($error)
{
    $_SESSION['error'] = $error;
}

function hasError()
{
    return !empty($_SESSION['error']);
}

function getError()
{
    $err = $_SESSION['error'] ?? '';
    unset($_SESSION['error']);

    return $err;
}

function is_admin()
{

    $user = user();

    if (empty($user)) {
        return false;
    }

    if ($user['role'] != "admin") {
        return false;
    }

    return true;
}

function is_user()
{

    $user = user();

    if (empty($user)) {
        return false;
    }

    if ($user['role'] != "user") {
        return false;
    }

    return true;
}

function check_admin()
{
    if (!is_admin()) {
        // die("You do not have permission to view this page!");
        $login = $base_url + "mtbs/login.php";
        Header("Location: " . $login);
    }
}


function check_user()
{
    if (!is_user()) {
        // die("You do not have permission to view this page!");
        $login = $base_url + "mtbs/login.php";
        Header("Location: " . $login);
    }
}
