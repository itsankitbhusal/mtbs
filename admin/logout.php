<?php
include "../url.php";
session_start();
unset($_SESSION["user_id"]);
session_destroy();
// unset($_SESSION["name"]);
$loc = $base_url + "/mtbs/login.php";
header("Location: " . $loc);
