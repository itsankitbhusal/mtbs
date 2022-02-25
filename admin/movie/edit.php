<?php

require_once __DIR__ . "/../components/admin.php";

$id = request('id');

$prev_result = all('genre');
$result = where('movie', 'id', '=', $id, false);


include  __DIR__ . "/../components/header.php";
include  __DIR__ . "/../components/sidebar.php";

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex m-4 justify-content-between mb-4">
        <h3>Edit movie details</h3>
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
    <form class="m-4" method="POST" action="./update.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            <input value="<?php echo $result['name'] ?>" name="name" type="text" class="form-control" id="name" placeholder="The Shawshank Redemption">
        </div>
        <div class="form-group">
            <label for="language">Language</label>

            <select name="language" class="form-control" id="language">
                <option <?php if ($result['language'] == "English") {
                            echo "selected";
                        } ?>>English</option>
                <option <?php if ($result['language'] == "Nepali") {
                            echo "selected";
                        } ?>>Nepali</option>
                <option <?php if ($result['language'] == "Hindi") {
                            echo "selected";
                        } ?>>Hindi</option>
                <option <?php if ($result['language'] == "Spanish") {
                            echo "selected";
                        } ?>>Spanish</option>
                <option <?php if ($result['language'] == "French") {
                            echo "selected";
                        } ?>>French</option>
            </select>
        </div>
        <div class="form-group">
            <label for="releseDate">Release Date</label>
            <input name="release_date" value="<?php echo $result['release_date']; ?>" type="date" class="form-control" id="releseDate">
        </div>
        <div class="form-group">
            <label for="runtime">Runtime </label>
            <br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Runtime </span>
                </div>
                <input value="<?php echo $result['hh'] ?>" name="hh" placeholder="hh" type="number" min="0" max="4" aria-label="hh" class="form-control">
                <input value="<?php echo $result['mm'] ?>" name="mm" placeholder="mm" type="number" min="0" max="59" aria-label="mm" class="form-control">
                <input value="<?php echo $result['ss'] ?>" name="ss" placeholder="ss" type="number" min="0" max="59" aria-label="ss" class="form-control">
            </div>

        </div>

        <div class="form-group">
            <label for="genre">Genre</label>
            <br>
            <!-- <select name="genre" multiple class="form-control" id="genre"> -->

            <?php foreach ($prev_result as $key) : ?>

                <input class="my-2 ml-4" type="checkbox" name='genre[]' value="<?php echo $key['name']; ?>"><?php echo $key['name']; ?>
                <!-- <option  name='genre[]' value="<?php /* echo $key['name']; ?>"><?php echo $key['name']; */ ?></option> -->
            <?php endforeach; ?>
            </select>
        </div>

        <div class="my-4">
            <img height="200px" src="../../uploads/<?php echo $result['image']; ?>">
        </div>
        <div class="form-group">
            <label for="image">Upload Image:</label>
            <input id="image" name="image" type="file" class="form-control-file">
        </div>


        <button type="submit" class="btn btn-primary">Update movie</button>

    </form>
</div>
</div>
<!-- End of Main Content -->
<?php include __DIR__ . "/../components/footer.php"; ?>