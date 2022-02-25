<?php

require_once __DIR__ . "/../components/admin.php";

$result = all('genre');

include  __DIR__ . "/../components/header.php";
include  __DIR__ . "/../components/sidebar.php";

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex m-4 justify-content-between mb-4">
        <h3>Add movie to database</h3>
        <a href="./index.php" class="btn btn-primary px-4">Go back</a>
    </div>
    <?php if (hasError()) : ?>
        <div class="ml-4 alert alert-danger">
            <?php echo getError(); ?>
        </div>
    <?php endif; ?>
    <?php if (hasSuccess()) : ?>
        <div class="ml-4 alert alert-success">
            <?php echo getSuccess(); ?>
        </div>
    <?php endif; ?>
    <!-- /.container-fluid -->
    <form class="m-4" method="POST" action="./store.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="The Shawshank Redemption">
        </div>
        <div class="form-group">
            <label for="language">Language</label>

            <select name="language" class="form-control" id="language">
                <option>English</option>
                <option>Nepali</option>
                <option>Hindi</option>
                <option>Spanish</option>
                <option>French</option>

            </select>
        </div>
        <div class="form-group">
            <label for="releseDate">Release Date</label>
            <input name="release_date" type="date" class="form-control" id="releseDate">
        </div>
        <div class="form-group">
            <label for="runtime">Runtime </label>
            <br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Runtime </span>
                </div>
                <input name="hh" placeholder="hh" type="number" min="0" max="4" aria-label="hh" class="form-control">
                <input name="mm" placeholder="mm" type="number" min="0" max="59" aria-label="mm" class="form-control">
                <input name="ss" placeholder="ss" type="number" min="0" max="59" aria-label="ss" class="form-control">
            </div>

        </div>

        <div class="form-group">
            <label for="genre">Genre</label>
            <br>
            <!-- <select name="genre" multiple class="form-control" id="genre"> -->
            <?php foreach ($result as $key) : ?>

                <!-- <option name='genre[]' value="<?php /* echo $key['name']; ?>"><?php echo $key['name']; */ ?>*/</option> -->
                <input class="my-2 ml-4" type="checkbox" name='genre[]' value="<?php echo $key['id']; ?>"><?php echo $key['name']; ?>
            <?php endforeach; ?>
            </select>
        </div>


        <div class="form-group">
            <label for="image">Upload Image:</label>
            <input id="image" name="image" type="file" class="form-control-file">
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Add movie</button>

    </form>
</div>
</div>
<!-- End of Main Content -->
<?php include __DIR__ . "/../components/footer.php"; ?>