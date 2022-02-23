<?php

require_once __DIR__ . "/../components/admin.php";

$id = request('id');

$result = where('hall', 'id', '=', $id, false);




print_r($result);


include  __DIR__ . "/../components/header.php";
include  __DIR__ . "/../components/sidebar.php";

?>



<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 ml-4 text-gray-800">Update Movie</h1>

    <?php if (hasError()) : ?>
        <div class="ml-4 alert alert-danger">
            <?php echo getError(); ?>
        </div>
    <?php endif; ?>

    <!-- /.container-fluid -->
    <form class="m-4" method="POST" action="./create.php">
        <div class="form-group">
            <label for="movieName">Name</label>
            <input name="name" type="text" class="form-control" id="movieName" placeholder="QFX Jalma">
        </div>

        <div class="form-group">
            <label for="total_seats">Total Seats</label>
            <input name="total_seats" type="number" class="form-control" id="total_seats">
        </div>



        <button type="submit" class="btn btn-primary">Add Cinema Hall</button>

    </form>
</div>
</div>
<!-- End of Main Content -->
<?php require_once "../components/footer.php"; ?>