<?php

session_start();
unset($_SESSION["user_id"]);

include "../url.php";
$loc = $base_url + "mtbs/login.php";

header("Location: " . $loc);
