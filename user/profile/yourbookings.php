<?php include './components/header.php';
require_once "./components/user.php";

$result = where('booking', 'user_id', '=', $_SESSION['user_id']);
echo '<pre>';
print_r($result);

?>

<div>
    <?php require_once "./components/header.php" ?>
    <div class="card overflow-hidden">
        <div class="row no-gutters row-bordered row-border-light">
            <div class="col-md-3 pt-0">
                <div class="list-group list-group-flush account-settings-links">
                    <a class="list-group-item" href="./index.php">General</a>
                    <a class="list-group-item" href="./changepass.php">Change Password</a>
                    <a class="list-group-item" href="./yourbookings.php">Your Bookings</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content ">


                    <div class="">
                        <div class="card-body pb-2">
                            <div class="container d-flex  gap-4 flex-wrap justify-content-center">

                                <?php foreach ($result as $key) : ?>
                                    <div class="card col-lg-2.5  hover-shadow border rounded">
                                        <div class="">
                                            <img src="./uploads/<?php echo $key['image']; ?>" class="img-fluid w-100 rounded" />

                                        </div>

                                        <a href="./user/book.php?id=<?php echo $key['id']; ?>" class="card-body " style="color: #4a4a4a;">
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
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                        </div>
                    </div>

                    <div class="text-right mt-3 mx-4 my-4 mb-5">
                        <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
                        <button type="button" class="btn btn-default">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include './components/footer.php' ?>
</div>

<?php include './components/footer.php' ?>