<?php
require "./functions/db.php";

$result = all('movie');



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
                        <a class="nav-link" href="#">HOME</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">MOVIES</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">ABOUT</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">CONTACT</a>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <a href="./register.php" class="btn btn-primary">Sign Up</a>
                <!-- Right elements -->
            </div>
            <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
    <!-- End your project here-->

    <!-- carousel start -->
    <?php
    // echo "<pre>";
    // print_r($result);
    // die;
    ?>

    <div id="carouselExampleControls" class="carousel slide" data-mdb-ride="carousel">

        <div class="carousel-inner">

            <?php
            $i = 0;
            $first = reset($result);
            foreach ($result as $key) :
            ?>


                <div class="carousel-item <?php

                                            if ($first == $key) {
                                                echo "active";
                                            } else {
                                                echo "";
                                            }

                                            ?>">
                    <img src="./cover/<?php echo $key['image_cover']; ?>" class="img-flui  d-block w-100" alt="" />
                </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleControls" data-mdb-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleControls" data-mdb-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>
    <!-- carousel end -->

    <!-- now showing starts -->

    <div class="container my-5">
        <div class="my-4">
            <h1 class="font-weight-bold">NOW SHOWING</h1>
        </div>
        <!-- cards -->
        <div class="container d-flex  gap-4 flex-wrap justify-content-center">

            <?php foreach ($result as $key) : ?>
                <div class="card col-lg-2.5  hover-shadow border">
                    <div class="">
                        <img src="./uploads/<?php echo $key['image']; ?>" class="img-fluid w-100" />

                    </div>

                    <div class="card-body">
                        <h5 class="card-title"><?php echo $key['name'] ?></h5>
                        <p class="card-text text-muted">
                            <?php
                            $genres = where('genre_movie', 'movie_id', '=', $key['id']);
                            $total_genre = count($genres);
                            $i = 1;
                            foreach ($genres as $g) {
                                $genre = find('genre', $g['genre_id']);
                                echo $genre['name'];
                                if ($i < $total_genre) echo ", ";
                                $i++;
                            }

                            ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>


        </div>
        <!-- cards -->




    </div>

    <!-- Footer -->
    <footer class="bg-light text-center container-fluid mt-5">
        <!-- Grid container -->
        <div class="container p-4 d-flex justify-content-between align-content-center">

            <!-- Section: Social media -->
            <div class="col-md-4 w-25 d-flex align-items-center">
                <img class="img-fluid w-75" src="./user/img/logoWithName.png" alt="logo">
            </div>
            <section class="mb-4 col-md-4 d-flex align-items-center">
                <div class="mt-4 ">
                    <!-- Facebook -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #4267B2" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

                    <!-- Instagram -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #fb3958" href="#!" role="button"><i class="fab fa-instagram"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #0072b1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
                    <!-- Github -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #171515" href="#!" role="button"><i class="fab fa-github"></i></a>

                </div>
            </section>
            <!-- Section: Social media -->




        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3">
            &copy; <?php echo date("Y"); ?> Copyright:
            <a class="text-dark font-weight-bold" href="#">Ankit Bhusal</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->

    <!-- now showing ends -->
    <!-- MDB -->
    <script type="text/javascript" src="./user/js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
</body>

</html>