<?php

session_start();
unset($_SESSION["user_id"]);
$loc = "http://localhost/mtbs/login.php";
header("Location: " . $loc);
