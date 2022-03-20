<?php

require_once __DIR__ . "/../components/admin.php";

// reciving data who has booked and maid payemnt

$result = query('select * from payment JOIN booking ON payment.booking_id = booking.id', true);

include  __DIR__ . "/../components/header.php";
include  __DIR__ . "/../components/sidebar.php";


?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="d-flex m-4 justify-content-between mb-4">
        <h3 class="font-weight-bold">Booking and Payment Details</h3>
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


    <div class="container">
        <p class="text-gray font-weight-bold mx-4">Booking</p>

        <table class="table mx-4 table-responsive-md table-borderless">
            <thead>
                <tr>
                    <th class="font-weight-bold text-center">Id</th>
                    <th class="font-weight-bold text-center">User Id</th>
                    <th class="font-weight-bold text-center">Show Id</th>
                    <th class="font-weight-bold text-center">Booked Seat</th>
                    <th class="font-weight-bold text-center">Total Price</th>
                    <th class="font-weight-bold text-center">Payment On</th>
                    <th class="font-weight-bold text-center">Status</th>
                    <th class="font-weight-bold text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $key) : ?>
                    <tr>
                        <td class="font-weight-bold text-center"><?php echo $key['id']; ?></td>
                        <td class=" text-center"><?php echo $key['user_id']; ?></td>
                        <td class=" text-center"><?php echo $key['show_id']; ?></td>
                        <td class=" text-center"><?php echo $key['booked_seat']; ?></td>
                        <td class=" text-center"><?php echo $key['total_price']; ?></td>
                        <td class=" text-center"><?php echo $key['payment_on']; ?></td>
                        <td class=" text-center"><?php echo $key['status']; ?></td>

                        <td class=" text-center">
                            <a class="btn btn-danger btn-sm rounded-5" style="height: 2rem;" onclick="confirmDelete(<?php echo $key['id']; ?>)" href="#!">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </a>
                            <?php if ($key['status'] != 'booked') : ?>
                                <a class="btn btn-primary btn-sm rounded-5" style="height: 2rem;" href="./approve.php?id=<?php echo $key['booking_id'] ?>">
                                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                        <path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" />
                                    </svg>
                                </a>
                            <?php endif; ?>
                            <?php if ($key['status'] == 'booked') : ?>
                                <svg class="mx-3 my-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                    <path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" />
                                </svg>
                            <?php endif ?>
                        </td>

                    </tr>
                <?php endforeach;  ?>
            </tbody>
        </table>


    </div>
</div>
</div>


<!-- End of Main Content -->
<?php include "../components/footer.php"; ?>