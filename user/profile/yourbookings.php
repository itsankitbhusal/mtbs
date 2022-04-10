<?php include './components/header.php';
require_once "./components/user.php";

$result = where('booking', 'user_id', '=', $_SESSION['user_id']);
$user_id = $_SESSION['user_id'];
$result = query("SELECT * FROM booking WHERE (user_id = $user_id AND status = 'booked')");

// echo "<pre>";
// print_r($result);
// // die;
// [id] => 55
//             [user_id] => 14
//             [show_id] => 27
//             [total_tickets] => 90
//             [unit_price] => 450
//             [status] => booked
//             [booked_seat] => 2
//             [total_price] => 900
//             [booking_time] => 2022-03-27 20:51:32


// die;

?>

<div>
    <?php require_once "./components/header.php" ?>
    <div class="card ">
        <div class="row no-gutters row-bordered row-border-light">
            <div class="col-md-3 pt-0">
                <div class="list-group list-group-flush account-settings-links">
                    <a class="list-group-item" href="./index.php">General</a>
                    <a class="list-group-item" href="./changepass.php">Change Password</a>
                    <a class="list-group-item" href="./yourbookings.php">Your Bookings</a>
                </div>
            </div>
            <div class="col-md-9 my-4">

                <?php

                $not_payed = query("SELECT * FROM booking WHERE (user_id = $user_id AND status = 'pending')");
                // echo "<pre>";
                // print_r($not_payed);
                // die;
                // Array
                // (
                //     [0] => Array
                //         (
                //             [id] => 37
                //             [user_id] => 14
                //             [show_id] => 27
                //             [total_tickets] => 90
                //             [unit_price] => 450
                //             [status] => pending
                //             [booked_seat] => 2
                //             [total_price] => 900
                //             [booking_time] => 2022-03-27 17:06:48
                //         )

                // )

                // $show = find('shows', $r['show_id']);
                // $movie_id = $show['movie_id'];


                // $result = where('movie', 'id', '=', $movie_id);




                ?>
                <?php
                if (!empty($not_payed)) :

                ?>
                    <p class="h3 font-weight-bold">Make Payment!!</p>
                    <hr>
                    <div class="d-flex flex-wrap gap-3 mb-5">
                        <?php
                        foreach ($not_payed as $n) :
                            $show_pending = find('shows', $n['show_id']);
                            $movie_id_pending = $show_pending['movie_id'];

                            $result_pending = where('movie', 'id', '=', $movie_id_pending);
                            $show_id = $n['show_id'];
                            foreach ($result_pending as $key) : ?>
                                <?php
                                // user id
                                //show id
                                //status
                                // booking_time

                                $find = query("SELECT id FROM `booking` WHERE(user_id = $user_id AND show_id = $show_id ) LIMIT 1");


                                $booking_id = $find[0]['id'];
                                // echo "<pre>";
                                // print_r($find);
                                // die;


                                // need booking id to pass in url
                                // $find = where('booking', 'id');


                                ?>
                                <a href="../payment.php?id=<?php echo $booking_id; ?>" class="card col-md-3  hover-shadow border rounded">
                                    <div class="">
                                        <img src="../../uploads/<?php echo $key['image']; ?>" class="img-fluid w-100 rounded" />
                                    </div>

                                    <div class="card-body " style="color: #4a4a4a;">
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
                                </a>
                                <br>

                    </div>

        <?php endforeach;
                        endforeach;
                    endif;

        ?>

        <p class="h3 font-weight-bold">Your Bookings!!</p>
        <hr>
        <div class="d-flex flex-wrap gap-3">
            <?php foreach ($result as $key) :
                $total_seats_db = $key['booked_seat'];
                $show = find('shows', $key['show_id']);
                $movie_id = $show['movie_id'];
                $result_movie = where('movie', 'id', '=', $movie_id);

                $show_time_db = $show['play_time'];
                $show_date_db = $show['play_date'];
                // echo "<pre>";
                // print_r($show);
                // die;
                // Array
                // (
                //     [id] => 28
                //     [hall_id] => 1
                //     [movie_id] => 16
                //     [play_date] => 2022-04-20
                //     [play_time] => 10:00:00
                //     [ticket_price] => 500
                // )


                foreach ($result_movie as $m) :
                    //                     echo "<pre>";
                    //                     print_r($m);
                    //                     die;
                    //                     Array
                    // (
                    //     [id] => 16
                    //     [name] => The Batman
                    //     [language] => English
                    //     [release_date] => 2022-03-04
                    //     [image] => 6226bc0fc413d.jpeg
                    //     [image_cover] => 6226bc0fc4627.jpeg
                    //     [runtime] => 153
                    // )
            ?>

                    <div class="card col-md-3 hover-shadow border rounded mb-5">
                        <div class="">
                            <img src="../../uploads/<?php echo $m['image']; ?>" class="img-fluid w-100 rounded" />

                        </div>

                        <div class="card-body " style="color: #4a4a4a;">
                            <h5 class="card-title"><?php echo $m['name'] ?></h5>
                            <p class="card-text text-muted">
                                <?php
                                $genres = where('genre_movie', 'movie_id', '=', $m['id']);
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
                            <div class="text-muted" style="font-size: .75rem; line-height: .5rem">
                                <p class="card-title">Booked Seats: <?php echo $total_seats_db; ?></p>
                                <p class="card-title">Show Date: <?php echo $show_date_db; ?></p>
                                <p class="card-title">Show Time: <?php echo $show_time_db; ?></p>

                            </div>
                        </div>
                    </div>

            <?php endforeach;
            endforeach; ?>
        </div>
        <?php
        if (empty($not_payed) && empty($result)) {
            echo '<h2 class="h2 mx-5 mt-5">Please book some movies!!</h2>';
        }
        ?>


            </div>
        </div>
    </div>
</div>

<?php include './components/footer.php' ?>