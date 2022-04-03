<?php require "./components/user.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/mdb.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />

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


    <div>
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
                    <a class="navbar-brand m-2 mt-lg-0" href="../index.php">
                        <img src="../img/logoWithName.png" height="30" alt="MTBS Logo" loading="lazy" />
                    </a>
                    <!-- Left links -->
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 font-weight-bold">
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="../../index.php">HOME</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="../../movie.php">MOVIES</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="../../about.php">ABOUT</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="../../contact.php">CONTACT</a>
                        </li>
                    </ul>
                    <!-- Left links -->
                </div>
                <!-- Collapsible wrapper -->

                <!-- Right elements -->
                <?php if (empty(($_SESSION['user_id']))) :       ?>
                    <div class="d-flex align-items-center mx-2">
                        <a href="../register.php" class="btn btn-outline-primary ">Sign Up</a>
                        <!-- Right elements -->
                    </div>
                    <div class="d-flex align-items-center mx-2">
                        <a href="../login.php" class="btn btn-primary">Log In</a>
                        <!-- Right elements -->
                    </div>
                <?php endif; ?>
                <?php if (!empty(($_SESSION['user_id']))) : ?>

                    <a href="../profile/" class="mx-sm-2 text-black mx-md-4 d-flex align-items-center gap-2 p-2 rounded px-4 hover-shadow">
                        <i class="fas fa-user-circle"></i>
                        <p class="d-block my-auto w-responsive">
                            <?php $user = find('user', $_SESSION['user_id']);
                            echo substr($user['name'], 0, 6);
                            ?>
                        </p>
                    </a>

                    <div class="d-flex align-items-center mx-2">
                        <a onclick="handleClickProfile();" class="btn btn-danger">Log Out</a>
                        <!-- Right elements -->
                    </div>
                <?php endif;    ?>
                <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->



        <div class="container light-style flex-grow-1 container-p-y my-5">

            <h4 class="font-weight-bold py-3 mb-4">
                Account settings
            </h4>