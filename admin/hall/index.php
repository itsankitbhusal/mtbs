<?php

require_once __DIR__ . "/../components/admin.php";



$result = all('hall');

include  __DIR__ . "/../components/header.php";
include  __DIR__ . "/../components/sidebar.php";


?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 ml-4 text-gray-800">Cinema Hall Details</h1>

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
    <table class="table mx-4">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Total Seats</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $key) : ?>
                <tr>

                    <td><?php echo $key['id']; ?></td>
                    <td><?php echo $key['name']; ?></td>
                    <td><?php echo $key['total_seats']; ?></td>
                    <td>
                        <a class="btn btn-primary btn-sm " href="./update.php">Update</a>
                        <a class="btn btn-danger btn-sm " href="./delete.php">Delete</a>
                    </td>
                </tr>
            <?php endforeach;  ?>
        </tbody>
    </table>
</div>
</div>
<!-- End of Main Content -->
<?php include "../components/footer.php"; ?>