<?php
require_once __DIR__ . "/../components/admin.php";
$id = request('id');

$result = find('movie', $id);

// echo "<pre>";
// print_r($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/mdb.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid position-absolute top-0 ">
        <img class="img-fluid" src="../../cover/<?php echo $result['image_cover']; ?>" alt="Cover Image" />
    </div>
    <div class="container">

        <div class=" d-flex justify-content-center" style="margin-top: 40vh;">
            <div class="card col-md-7">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img style="width: 20vw;" src="../../uploads/<?php echo $result['image'] ?>" class="img-fluid rounded-start" alt="...">
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
    </div>

</body>

</html>