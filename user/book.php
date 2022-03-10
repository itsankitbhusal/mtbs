<?php
require "../functions/db.php";
require "../functions/functions.php";

check_user();

$id = request('id');

$shows = where('shows', 'movie_id', '=', $id);


$result = find('movie', $id);
if (empty($shows)) {
    setError("Please provide valid id!!");
    header("Location: ../index.php");
    die;
}
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
    <link rel="stylesheet" href="../user/css/mdb.min.css">

    <title>Book - <?php echo $result['name']; ?> </title>

</head>

<div class="container-fluid position-absolute top-0 ">
    <img class="img-fluid" src="../cover/<?php echo $result['image_cover']; ?>" alt="Cover Image" />
</div>
<div class="container">

    <div class=" d-flex justify-content-center" style="margin-top: 40vh;">
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
    <div>
        <?php
        echo "<pre>";
        print_r($shows);

        foreach ($shows as $s) {
            echo $s['id'];
        }

        die;
        ?>
        <form class="m-4" method="POST" action="./store.php?id=<?php echo $shows['id']; ?>">


            <div class="form-group">
                <label for="show_date">Choose Show Date</label>
                <select name="show_date" class="form-control" id="show_date">
                    <?php
                    foreach ($shows as $s) :
                    ?>
                        <option value="<?php echo $s['id']; ?>"><?php echo $s['play_date']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="ticket">Pick Show Tickets</label>
                <input min="1" max="5" id="ticket" class="form-control" type="number">
            </div>

            <br>
            <button type="submit" class="btn btn-primary">Continue</button>

        </form>
    </div>
</div>


<body>


</body>

</html>