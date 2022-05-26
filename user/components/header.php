<?php
require "./functions/db.php";
require "./functions/functions.php";
// $result = all('movie');
// setting limit for now showing
$result = query('SELECT * from `movie` ORDER BY `id` DESC LIMIT 8');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>MTBS - Movie Ticket Booking System</title>
    <!-- MDB icon -->
    <link rel="icon" href="#" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="./user/css/mdb.min.css" />
    <link rel="stylesheet" href="./user/css/style.css">
    <style>
        html {
            scrollbar-width: thin;

        }

        html::-webkit-scrollbar {
            width: .5vw;
        }

        html::-webkit-scrollbar-thumb {
            background-color: gray;
        }

        html::-webkit-scrollbar-track {
            background-color: white;
        }
    </style>
</head>

<body>
    <!-- Start your project here-->
    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse justify-content-center " id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand m-2 mt-lg-0" href="./index.php">
                    <img src="./user/img/logoWithName.png" height="30" alt="MTBS Logo" loading="lazy" />
                </a>
                <!-- Left links -->
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 font-weight-bold">
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="./index.php">HOME</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="./movie.php">MOVIES</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="./about.php">ABOUT</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="./contact.php">CONTACT</a>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <?php if (empty(($_SESSION['user_id']))) :       ?>
                <div class="d-flex align-items-center mx-2">
                    <a href="./register.php" class="btn btn-outline-primary ">Sign Up</a>
                    <!-- Right elements -->
                </div>
                <div class="d-flex align-items-center mx-2">
                    <a href="./login.php" class="btn btn-primary">Log In</a>
                    <!-- Right elements -->
                </div>
            <?php endif; ?>
            <?php if (!empty(($_SESSION['user_id']))) : ?>
                <?php $id = $_SESSION['user_id'];
                $is_user = query("SELECT * FROM `user` WHERE (id = $id AND role='user') LIMIT 1");

                if ($is_user) : ?>
                    <a href="./user/profile/" class="mx-sm-2 mx-md-4 text-black d-flex align-items-center gap-2 p-2 rounded px-4 hover-shadow">
                        <i class="fas fa-user-circle"></i>
                        <p class="d-block my-auto w-responsive">
                            <?php $user = find('user', $_SESSION['user_id']);
                            echo substr($user['name'], 0, 6);
                            ?>
                        </p>
                    </a>
                <?php endif; ?>

                <div class="d-flex align-items-center mx-2">
                    <a id="logOut" class="btn btn-danger">Log Out</a>
                    <!-- Right elements -->
                </div>
            <?php endif;    ?>
            <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->