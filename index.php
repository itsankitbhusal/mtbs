<?php require_once "./user/components/header.php"; ?>
<!-- carousel start -->
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
        <span style="font-size: 2rem;" class="fas fa-angle-left" aria-hidden="true">
        </span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleControls" data-mdb-slide="next">
        <span style="font-size: 2rem;" class="fas fa-angle-right" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>

</div>
<!-- carousel end -->

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
<!-- now showing starts -->

<div class="container my-5">
    <div class="my-4 d-flex mx-auto align-items-center col-md-12">
        <h1 class="font-weight-bold col-md-6">NOW SHOWING</h1>
        <!-- <div class="input-group justify-content-end">
                <div class="form-outline">
                    <input type="search" id="form1" class="form-control" />
                    <label class="form-label" for="form1">Search</label>
                </div>
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div> -->
    </div>
    <!-- cards -->
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
    <!-- cards -->
</div>

<?php require_once "./user/components/footer.php" ?>