<?php require_once "./components/header.php";
require_once "./components/user.php";
?>
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
            <div class="tab-content ">


                <div class="">
                    <div class="card-body pb-2">

                        <div class="form-group">
                            <label class="form-label">Current password</label>
                            <input type="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="form-label">New password</label>
                            <input type="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Repeat new password</label>
                            <input type="password" class="form-control">
                        </div>

                    </div>
                </div>

                <div class="text-right mt-3 mx-4 my-4 mb-5">
                    <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
                    <button type="button" class="btn btn-default">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include './components/footer.php' ?>