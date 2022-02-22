<?php

include "../../functions/db.php";
include "../../functions/functions.php";
if (!empty($_POST)) {

    $name = request('name');
    $language = request('language');
    $release_date = request('release_date');
    $runtime = request('hh') . ":" . request('mm') . ":" . request('ss');
    $genre = request('genre');

    print_r($name);
}

?>
<?php include  "../crudComp/header.php"; ?>
<?php include  "../crudComp/sidebar.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 ml-4 text-gray-800">Add movie to database</h1>

    <!-- /.container-fluid -->
    <form class="m-4" method="POST" action="./create.php">
        <div class="form-group">
            <label for="movieName">Name</label>
            <input name="name" type="text" class="form-control" id="movieName" placeholder="The Shawshank Redemption">
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
                    <span class="input-group-text">Runtime | hh/mm/ss</span>
                </div>
                <input name="hh" placeholder="hh" type="number" min="0" max="4" aria-label="hh" class="form-control">
                <input name="mm" placeholder="mm" type="number" min="0" max="59" aria-label="mm" class="form-control">
                <input name="ss" placeholder="ss" type="number" min="0" max="59" aria-label="ss" class="form-control">
            </div>

        </div>

        <div class="form-group">
            <label for="genre">Genre</label>
            <select name="genre" multiple class="form-control" id="genre">
                <option>Action</option>
                <option>Drama</option>
                <option>Thriller</option>
                <option>SciFi</option>
                <option>Comedy</option>
            </select>
        </div>


        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upload Image</span>
                </div>
                <div class="custom-file">
                    <input name="image" type="file" class="custom-file-input" id="inputGroupFile01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
        </div>

        <button name="name" type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
</div>
<!-- End of Main Content -->
<?php include "../crudComp/footer.php"; ?>