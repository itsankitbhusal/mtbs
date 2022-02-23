<?php

require_once __DIR__ . "/../components/admin.php";



$result = all('hall');

include  __DIR__ . "/../components/header.php";
include  __DIR__ . "/../components/sidebar.php";


?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="d-flex m-4 justify-content-between mb-4">
        <h3>Cinema Hall Details</h3>
        <a href="./create.php" class="btn btn-primary px-4">Add New Hall</a>
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
                        <a class="btn btn-primary btn-sm " href="#!">Show</a>
                        <a class="btn btn-primary btn-sm " href="./edit.php?id=<?php echo $key['id']; ?>">Update</a>
                        <a class="btn btn-danger btn-sm " onclick="confirmDelete(<?php echo $key['id']; ?>)" href="#!">Delete</a>
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