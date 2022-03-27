<?php require_once "./components/header.php";
require_once "./components/user.php";

$user_id = $_SESSION['user_id'];

$user = find('user', $user_id);
// echo "<pre>";
// print_r($user);
// die;
// Array
// (
//     [id] => 14
//     [name] => user
//     [email] => user@user.com
//     [password] => $2y$10$0s73U8a1JQ8ZknbSr/ABduxeXDaf1/K9UPDrfP1w0woFQ6SEnQsMC
//     [role] => user
//     [phone] => 
// )


?>
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

<div class="card overflow-hidden">
    <div class="row no-gutters row-bordered row-border-light">
        <div class="col-md-3 pt-0">
            <div class="list-group list-group-flush account-settings-links">
                <a class="list-group-item" href="./index.php">General</a>
                <a class="list-group-item" href="./changepass.php">Change Password</a>
                <a class="list-group-item" href="./yourbookings.php">Your Bookings</a>
            </div>
        </div>
        <div class="col-md-9">
            <form method="POST" action="./update.php" class="tab-content ">
                <div class="">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control mb-1" value="<?php echo $user['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">E-mail</label>
                            <input type="text" name="email" class="form-control mb-1" value="<?php echo $user['email'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone</label>
                            <input type="number" name="phone" class="form-control" value="<?php echo $user['phone'] ?>">
                        </div>
                    </div>

                </div>
                <div class="text-right mt-3 mx-4 my-4 mb-5">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include './components/footer.php' ?>