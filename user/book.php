<?php
require "./components/user.php";

check_user();

$id = request('id');

$shows = where('shows', 'movie_id', '=', $id);


$result = find('movie', $id);
// if (empty($shows)) {
//     setError("Please provide valid id!!");
//     header("Location: ../index.php");
//     die;
// }
foreach ($shows as $s) {
    if ($id != $s['movie_id']) {
        setError("Please provide valid id!!");
        header("Location: ../index.php");
        die;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/mdb.min.css">

    <title>Book - <?php echo $result['name']; ?> </title>

</head>

<body>

    <div class="container-fluid position-absolute top-0 ">
        <img class="img-fluid" src="../cover/<?php echo $result['image_cover']; ?>" alt="Cover Image" />
    </div>
    <div class="container">
        <?php if (hasError()) : ?>
            <div id="error" class="ml-4 alert alert-danger">
                <?php echo getError(); ?>
            </div>
        <?php endif; ?>
        <?php if (hasSuccess()) : ?>
            <div id="success" class="ml-4 alert alert-success">
                <?php echo getSuccess(); ?>
            </div>
        <?php endif; ?>

        <div class=" d-flex justify-content-center" style="margin-top: 30vh;">
            <div class="card col-md-7">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img style="width: 20vw;" src="../uploads/<?php echo $result['image'] ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center ">
                        <div class="card-body text-left">
                            <h5 class="card-title font-weight-bold h2"><?php echo $result['name']; ?></h5>
                            <br>
                            <p class="card-text text-muted">Language: <span class="text-black"><?php echo $result['language']; ?></span></p>
                            <p class="card-text text-muted">Release Date: <span class="text-black"><?php echo $result['release_date']; ?></span></p>
                            <p class="card-text text-muted">Runtime: <span class="text-black"><?php echo $result['runtime'] . "Minutes"; ?></span></p>

                            <p class="card-text text-muted">Genre: <small class="text-black">
                                    <?php
                                    $genres = where('genre_movie', 'movie_id', '=', $result['id']);
                                    $total_genre = count($genres);
                                    $i = 1;
                                    foreach ($genres as $g) {
                                        $genre = find('genre', $g['genre_id']);
                                        echo $genre['name'];
                                        if ($i != $total_genre) echo ", ";
                                        $i++;
                                    }
                                    ?>
                                </small></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class=" d-flex flex-row mb-5 justify-content-center gap-5 ">
                <?php $i = 1;
                if (empty($shows)) {
                    echo "<h1>Shows not available!!</h1>";
                }
                if (!empty($shows)) :
                    foreach ($shows as $s) : ?>
                        <a href="./ticket.php?id=<?php echo $s['id']; ?>" class="my-4">

                            <div class="bg-white font-weight-bold text-center text-black-50 shadow-4-strong  p-5 rounded-circle d-inline-block">
                                <?php
                                echo "Show $i<br>";
                                echo $s['play_date'] . "<br>";
                                echo $s['play_time'];
                                $i++;
                                ?>
                            </div>

                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>


        </div>
    </div>


</body>
<script src="./js/script.js"></script>

</html>