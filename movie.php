<?php require_once "./user/components/header.php";

$search = request('search');

if (strlen($search) >= 3) {
    $result = query("SELECT * FROM `movie` WHERE (`name` LIKE '%" . $search . "%')");
    if (empty($result)) {
        setError('No data found!!');
    }
}


if (hasError()) : ?>
    <div id="error" class="ml-4 alert alert-danger">
        <?php echo getError(); ?>
    </div>
<?php endif; ?>
<?php if (hasSuccess()) : ?>
    <div id="success" class="ml-4 alert alert-success">
        <?php echo getSuccess(); ?>
    </div>
<?php endif; ?>

<div class="container my-5">

    <form action="" method="GET">
        <div class="my-4 d-flex mx-auto align-items-center col-md-12">
            <h1 class="font-weight-bold col-md-6">Movies</h1>
            <div class="input-group justify-content-end">
                <div class="form-outline">
                    <input name="search" type="search" id="form1" class="form-control" />
                    <label class="form-label" for="form1">Search</label>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
    <!-- cards -->
    <div class="container d-flex  gap-4 flex-wrap justify-content-center">

        <?php foreach ($result as $key) : ?>
            <a href="./user/book.php?id=<?php echo $key['id']; ?>" class="card col-lg-2.5  hover-shadow border rounded">
                <div class="">
                    <img src="./uploads/<?php echo $key['image']; ?>" class="img-fluid w-100 rounded" />

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
        <?php endforeach; ?>
    </div>
    <!-- cards -->
</div>


<?php
if (empty($result)) {
    echo '<p style="height:50vh;"> </p>';
}
require_once "./user/components/footer.php"; ?>