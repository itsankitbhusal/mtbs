<?php
require "./functions/db.php";
require "./functions/functions.php";

$result = all('movie');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTBS - Movie Ticket Booking System</title>
    <link rel="stylesheet" href="./user/css/bootstrap.min.css">
    <link rel="stylesheet" href="./user/css/style.css">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Khula:wght@400;700;800&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- font-end -->
</head>

<body>

    <!-- Navbar stars -->
    <nav style="font-family: 'Khula', sans-serif; font-weight: 700; font-size:1rem;" class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img style="width:15vw;" class="p-2 logo img-fluid" src="./user/img/logoWithName.png" alt="CineMatic Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-buttons">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="px-4 nav-link active" aria-current="page" href="#">HOME</a>
                    </li>
                    <li class="px-4 nav-item" style="font-family: 'Khula', sans-serif;">
                        <a style="font-family: 'Khula', sans-serif;" class="nav-link font-weight-bold" href="#">MOVIES</a>
                    </li>
                    <li class="px-4 nav-item">
                        <a class="nav-link" href="#">ABOUT</a>
                    </li>
                    <li class="px-4 nav-item">
                        <a class="nav-link" href="#">CONTACT</a>
                    </li>

                </ul>
            </div>
            <div class="nav-item">
                <button style="font-family: 'Khula', sans-serif; font-weight: 700; font-size:1rem; margin: 5px" class="btn btn-success px-4" type="submit">Sign In</button>
            </div>

        </div>
    </nav>
    <!-- Navbar ends -->

    <!-- hero section carousel -->


    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item">
                <img class="d-block w-100 " src="./user/img/img1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 " src="./user/img/img2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item active">
                <img class="d-block w-100 " src="./user/img/img3.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 " src="./user/img/img4.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 " src="./user/img/img5.jpg" alt="Fourth slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 " src="./user/img/img6.jpg" alt="Fifth slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 " src="./user/img/img7.jpg" alt="Sixth slide">
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- hero section carousel end -->

    <!-- now showing -->
    <div class="container ">
        <h1 class="h1 my-4" style="font-family: 'Khula', sans-serif; font-weight: 900; ">NOW SHOWING</h1>

        <div class="d-flex flex-wrap ">
            <!-- foo -->
            <?php foreach ($result as $key) : ?>
                <!-- <div class="d-inline-block "> -->
                <!-- <div class=""> -->
                <div class="w-25 d-inline-block">
                    <img style="width: 20vw;" class="" src="./uploads/<?php echo $key['image'] ?>" alt="movie poster">
                    <h4><?php echo $key['name'] ?></h4>
                    <p style="font-family: poppins,sans-serif;">
                        <?php
                        $genre = where('genre_movie', 'movie_id', "=", $key['id']);
                        foreach ($genre as $g) :
                            $genre_name = where('genre', 'id', '=', $g['genre_id']);
                            $total_genre = count($genre);
                            foreach ($genre_name as $gen) {
                                echo $gen['name'] . " ";
                            };
                        endforeach; ?>
                    </p>
                    <!-- </div> -->
                    <!-- </div>  -->
                </div>
            <?php endforeach; ?>
            <!-- fooo -->
        </div>

    </div>



    <!-- now showing end -->



    <!-- scripts for slider -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>