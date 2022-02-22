<?php

require "./functions/db.php";

unset($_SESSION['user_id']);

//back to login 
header("Location: ./login.php");
