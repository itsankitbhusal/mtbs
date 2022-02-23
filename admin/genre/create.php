<?php

require_once __DIR__ . "/../components/admin.php";

if (!empty($_POST)) {

    $name = request('name');
    $description = request('description');
    if (!empty($name) && !empty($description)) {

        create('genre', compact("name", "description"));
        setSuccess("Genre added sucessfully!");
        header("Location: index.php");
        die();
    } else {
        setError("Please fill all the fields!");
        // die("Please fill both fields!!");
        header("Location:  create.php");
        die();
    }
}
include  __DIR__ . "/../components/header.php";
include  __DIR__ . "/../components/sidebar.php";

?>



<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="d-flex m-4 justify-content-between mb-4">
        <h3>Add Genre to database</h3>
        <a href="./index.php" class="btn btn-primary px-4">Go back</a>
    </div>
    <?php if (hasError()) : ?>
        <div class="ml-4 alert alert-danger">
            <?php echo getError(); ?>
        </div>
    <?php endif; ?>

    <!-- /.container-fluid -->
    <form class="m-4" method="POST" action="./create.php">
        <div class="form-group">
            <label for="movieName">Name</label>
            <input name="name" type="text" class="form-control" id="movieName" placeholder="Sci-Fi">
        </div>

        <div class="form-group">
            <label for="total_seats">Description</label>
            <textarea name="description" type="text" class="form-control " id="total_seats"></textarea>
        </div>



        <button type="submit" class="btn btn-primary">Add Genre</button>

    </form>
</div>
</div>
<!-- End of Main Content -->
<?php require_once "../components/footer.php"; ?>