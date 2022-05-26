<?php require_once "./user/components/header.php";

$search = request('search');

// limit for a page
$limit = 3;
$page = request('page');


if ($page <= 0) {
    $offset = 0;
    $page = 1;
} elseif ($page == 1) {
    $offset = 0;
    $page = 1;
} elseif ($page > 1) {
    // loop for setting the offset
    $offset = ($page - 1) * $limit;
}

// get list of total movies in database
$total_movies = count($result);

if ($limit < $total_movies) {
    // total pages
    $total_pages = ceil($total_movies / $limit);

    // echo "$offset, $limit";

    if ($page) {
        $result = query("SELECT * FROM movie ORDER BY id DESC LIMIT $offset, $limit");
    }
} else {
    $result = query("SELECT * FROM movie ORDER BY id DESC LIMIT 1, $limit");
    $total_pages = null;
}




// php code for searching movies
if (strlen($search) >= 3) {
    $result = query("SELECT * FROM `movie` WHERE (`name` LIKE '%" . $search . "%')  ");
    if (empty($result)) {
        // setError('No data found!!');
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

<!-- php code for pagination -->
<?php


?>

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
    <?php
    if (empty($result)) {
        echo '<h5 style="height:50vh;"> No result Found!!</h5>';
    }
    ?>
    <!-- cards -->

    <!-- pagination starts -->
    <?php if ($total_pages > 1 && !$search) : ?>

        <div class="mt-5">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">

                    <?php
                    // loop for pagination
                    for ($i = 1; $i <= $total_pages; $i++) {
                        if ($i == $page) {
                            echo '<li class="page-item active" onclick="event.preventDefault()"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                        } else {
                            echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                        }
                    }
                    ?>
                    <!-- <li>
                        hello
                    </li> -->



                </ul>
            </nav>
        </div>
    <?php endif; ?>
    <!-- pagination ends -->
</div>



<?php

require_once "./user/components/footer.php"; ?>