<?php
require_once __DIR__ . "/../components/admin.php";
$result = all('movie');
include  __DIR__ . "/../components/header.php";
include  __DIR__ . "/../components/sidebar.php";
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex m-4 justify-content-between mb-4">
        <h3 class="font-weight-bold">Movie Details</h3>
        <a href="./create.php" class="btn btn-primary px-4 font-weight-bold">Add Movie</a>
    </div>
    <!-- /.container-fluid -->

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


    <table class="table mx-4 table-responsive-md table-borderless">
        <thead>
            <tr>
                <th class="font-weight-bold text-center">Id</th>
                <th class="font-weight-bold text-center">Name</th>
                <th class="font-weight-bold text-center">Language</th>
                <th class="font-weight-bold text-center">Release Date</th>
                <th class="font-weight-bold text-center">Genre</th>
                <th class="font-weight-bold text-center">Runtime</th>
                <th class="font-weight-bold text-center">Image</th>
                <th class="font-weight-bold text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $key) :
                $runtime = $key['runtime'] . " Minutes";
            ?>
                <tr>

                    <td class="font-weight-bold"><?php echo $key['id']; ?></td>
                    <td class="text-center"><?php echo $key['name']; ?></td>
                    <td class="text-center"><?php echo $key['language']; ?></td>
                    <td class="text-center"><?php echo $key['release_date']; ?></td>
                    <td class="text-center"><?php
                                            $genres = where('genre_movie', 'movie_id', '=', $key['id']);
                                            $total_genre = count($genres);
                                            $i = 1;
                                            foreach ($genres as $g) {
                                                $genre = find('genre', $g['genre_id']);
                                                echo $genre['name'];
                                                if ($i != $total_genre) echo ", ";
                                                $i++;
                                            }

                                            ?></td>

                    <td class="text-center"><?php echo $runtime; ?></td>

                    <td class="text-center"> <img width="50px" src="../../uploads/<?php echo $key['image']; ?>"></td>
                    <td class="text-center">
                        <a class="btn btn-primary btn-sm mx-2" href="./edit.php?id=<?php echo $key['id']; ?>">Update</a>
                        <a class="btn btn-danger btn-sm mx-2" onclick="confirmDelete(<?php echo $key['id']; ?>)" href="#!">Delete</a>
                    </td>
                </tr>
            <?php endforeach;  ?>
        </tbody>
    </table>
</div>
</div>

<script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this?')) {
            location.href = './delete.php?id=' + id;
        }
    }
</script>
<!-- End of Main Content -->
<?php include "../components/footer.php"; ?>