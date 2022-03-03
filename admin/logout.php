<?php

session_start();
unset($_SESSION["user_id"]);
session_destroy();
// unset($_SESSION["name"]);
$loc = "http://localhost/mtbs/login.php";
header("Location: " . $loc);
