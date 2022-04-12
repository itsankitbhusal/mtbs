<?php

require_once __DIR__ . "/../components/admin.php";

$id = request('id');

$prev_result = all('genre');
$result = where('movie', 'id', '=', $id, false);
if (empty($result)) {
    setError("Provide valid id!!");
    header("Location: ./index.php");
    die;
}
$genre_list = where('genre_movie', 'movie_id', '=', $id);

$genre_ids = [];
foreach ($genre_list as $ge) {
    $genre_ids[] = $ge['genre_id'];
}


include  __DIR__ . "/../components/header.php";
include  __DIR__ . "/../components/sidebar.php";

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex m-4 justify-content-between mb-4">
        <h3 class="font-weight-bold">Edit movie details</h3>
        <a href="./index.php" class="btn btn-primary px-4 font-weight-bold">Go back</a>
    </div>
    <?php if (hasError()) : ?>
        <div id="error" class="ml-4 alert alert-danger">
            <?php echo getError(); ?>
        </div>
    <?php endif; ?>


    <!-- /.container-fluid -->
    <div class="container d-flex ">
        <form class="m-4 col-md-8  " method="POST" action="./update.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input required value="<?php echo $result['name'] ?>" name="name" type="text" class="form-control" id="name" placeholder="The Shawshank Redemption">
            </div>
            <div class="form-group">
                <label for="language">Language</label>

                <select required name="language" class="form-control" id="language">
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
                <input required name="release_date" value="<?php echo $result['release_date']; ?>" type="date" class="form-control" id="releseDate">
            </div>
            <div class="form-group">
                <label for="runtime">Runtime </label>
                <br>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Runtime </span>
                    </div>
                    <input required value="<?php echo $result['runtime'] ?>" name="runtime" placeholder="runtime in minutes" type="number" min="0" max="250" aria-label="hh" class="form-control">
                </div>

            </div>

            <div class="form-group">
                <label for="genre">Genre</label>
                <br>
                <!-- <select name="genre" multiple class="form-control" id="genre"> -->

                <?php foreach ($prev_result as $key) : ?>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" <?php if (in_array($key['id'], $genre_ids)) echo 'checked'; ?> value="<?php echo $key['id']; ?>" type="checkbox" id="<?php echo $key['id']; ?>" name='genre[]'>
                        <label for="<?php echo $key['id']; ?>"><?php echo $key['name']; ?></label>
                    </div>


                <?php endforeach; ?>
                </select>
            </div>


            <div class="form-group">
                <label class="form-label" for="image">Upload Image:</label>
                <input id="image" name="image" type="file" class="form-control">
            </div>

            <div class="form-group">
                <label class="form-label" for="image">Upload Cover:</label>
                <input id="image" name="image_cover" type="file" class="form-control">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Update movie</button>

        </form>
        <div class="my-4 col-md-3 mt-5">
            <img class="img-fluid rounded" src="../../uploads/<?php echo $result['image']; ?>">
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->
<?php include __DIR__ . "/../components/footer.php"; ?>