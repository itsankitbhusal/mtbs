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
        <h3 class="font-weight-bold">Add movie to database</h3>
        <a href="./index.php" class="btn btn-primary px-4 font-weight-bold">Go back</a>
    </div>
    <?php if (hasError()) : ?>
        <div id="error" class="message ml-4 alert alert-danger">
            <?php echo getError(); ?>
        </div>
    <?php endif; ?>


    <!-- /.container-fluid -->
    <form class="m-4" method="POST" action="./store.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            <input required name="name" type="text" class="form-control" id="name" placeholder="The Shawshank Redemption">
        </div>
        <div class="form-group">
            <label for="language">Language</label>

            <select required name="language" class="form-control" id="language">
                <option>English</option>
                <option>Nepali</option>
                <option>Hindi</option>
                <!-- <option>Spanish</option>
                <option>French</option> -->
            </select>
        </div>
        <div class="form-group">
            <label for="releseDate">Release Date</label>
            <input required name="release_date" type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="releseDate">
        </div>
        <div class="form-group">
            <label for="runtime">Runtime </label>
            <br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Runtime </span>
                </div>
                <!-- <input name="hh" placeholder="hh" type="number" min="0" max="4" aria-label="hh" class="form-control"> -->
                <input required name="runtime" placeholder="Runtime in minutes" type="number" max="250" aria-label="mm" class="form-control">
                <!-- <input name="ss" placeholder="ss" type="number" min="0" max="59" aria-label="ss" class="form-control"> -->
            </div>

        </div>

        <div class="form-group">
            <label for="genre">Genre</label>
            <br>
            <?php foreach ($result as $key) : ?>
                <div class="form-check form-check-inline">
                    <input required class="form-check-input" value="<?php echo $key['id']; ?>" type="checkbox" id="<?php echo $key['id']; ?>" name='genre[]'>
                    <label for="<?php echo $key['id']; ?>"><?php echo $key['name']; ?></label>
                </div>

            <?php endforeach; ?>
            </select>
        </div>


        <div class="form-group">
            <label class="form-label" for="image">Upload Image:</label>
            <input required id="image" name="image" type="file" class="form-control">
        </div>

        <div class="form-group">
            <label class="form-label" for="image">Upload Cover:</label>
            <input required id="image" name="cover" type="file" class="form-control">
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Add movie</button>

    </form>


</div>
</div>
<!-- End of Main Content -->
<?php include __DIR__ . "/../components/footer.php"; ?>