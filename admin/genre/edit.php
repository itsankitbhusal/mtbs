<?php

require_once __DIR__ . "/../components/admin.php";

$id = request('id');


$result = where('genre', 'id', '=', $id, false);

if (empty($result)) {
    Header("Location: ./index.php");
}

include  __DIR__ . "/../components/header.php";
include  __DIR__ . "/../components/sidebar.php";
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex m-4 justify-content-between mb-4">
        <h3 class="font-weight-bold">Update Genre Details</h3>
        <a href="./index.php" class="btn btn-primary px-4 font-weight-bold">Go back</a>
    </div>
    <?php if (hasError()) : ?>
        <div id="error" class="ml-4 alert alert-danger">
            <?php echo getError(); ?>
        </div>
    <?php endif; ?>

    <!-- /.container-fluid -->
    <form class="m-4" method="POST" action="update.php?id=<?php echo $id; ?>">
        <div class="form-group">
            <label for="movieName">Name</label>
            <input name="name" type="text" class="form-control" id="movieName" value="<?php echo $result['name']; ?>" placeholder="QFX Jalma">
        </div>
        <button type="submit" class="btn btn-primary">Update Cinema genre</button>

    </form>
</div>
</div>
<!-- End of Main Content -->
<?php require_once "../components/footer.php"; ?>