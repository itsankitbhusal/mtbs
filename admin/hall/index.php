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
        <h3 class="font-weight-bold">Cinema Hall Details</h3>
        <a href="./create.php" class="btn btn-primary px-4 font-weight-bold">Add New Hall</a>
    </div>
    <!-- /.container-fluid -->

    <?php if (hasError()) : ?>
        <div id="error" class="ml-4 alert alert-danger">
            <?php echo getError(); ?>
        </div>
    <?php endif; ?>
    <?php if (hasSuccess()) : ?>
        <div id="success" class="ml-4 alert alert-success">
            <?php echo getSuccess(); ?>
        </div>
    <?php endif; ?>


    <table class="table mx-4 table-responsive-md table-bordered">
        <thead>
            <tr>
                <th class="text-center font-weight-bold">Id</th>
                <th class="text-center font-weight-bold">Name</th>
                <th class="text-center font-weight-bold">Total Seats</th>
                <th class="text-center font-weight-bold">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $key) : ?>
                <tr>

                    <td class="text-center font-weight-bold"><?php echo $key['id']; ?></td>
                    <td class="text-center"><?php echo $key['name']; ?></td>
                    <td class="text-center"><?php echo $key['total_seats']; ?></td>
                    <td class="text-center">
                        <a class="btn btn-primary btn-sm rounded-5" style="height: 2rem;" href="./edit.php?id=<?php echo $key['id']; ?>">

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                                <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                            </svg>
                        </a>
                        <a class="btn btn-danger btn-sm rounded-5" style="height: 2rem;" onclick="confirmDelete(<?php echo $key['id']; ?>)" href="#!">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg>
                        </a>
                    </td>
                </tr>
            <?php endforeach;  ?>
        </tbody>
    </table>
</div>
</div>



<!-- End of Main Content -->
<?php include "../components/footer.php"; ?>