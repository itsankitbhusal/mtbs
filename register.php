<?php
require "./functions/db.php";
require "./functions/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register</title>

    <link rel="stylesheet" href="./user/css/mdb.min.css">
</head>

<body id="page-top">
    <section class="">
        <div class="container-fluid ">
            <div>
                <div class="vh-100 d-flex align-items-center justify-content-center">
                    <div>
                        <h1 class="h3 mb-4 text-gray-800">Register</h1>
                        <form action="./register.inc.php" method="POST">
                            <!-- error -->
                            <?php if (hasError()) : ?>
                                <div id="error" class="ml-4 alert alert-danger">
                                    <?php echo getError(); ?>
                                </div>
                            <?php endif; ?>

                            <!-- Name input -->
                            <div class="form-outline">
                                <label class="form-label" for="name">Full Name</label>
                                <input style="border: 1px solid #dedede; border-radius: 5px" name="name" type="name" id="name" class="form-control " />
                            </div>

                            <!-- Email input -->
                            <div class="form-outline">
                                <label class="form-label" for="form3Example3">Email address</label>
                                <input style="border: 1px solid #dedede; border-radius: 5px" name="email" type="email" id="form3Example3" class="form-control " />
                            </div>

                            <!-- Phone input -->
                            <div class="form-outline">
                                <label class="form-label" for="phone">Phone no.</label>
                                <input style="border: 1px solid #dedede; border-radius: 5px" name="phone" type="text" id="phone" class="form-control " />
                            </div>

                            <!-- Password input -->
                            <div class="form-outline ">
                                <label class="form-label" for="password">Password</label>
                                <input style="border: 1px solid #dedede; border-radius: 5px" name="password" type="password" id="password" class="form-control" />
                            </div>
                            <!--Confirm Password input -->
                            <div class=" form-outline ">
                                <label class=" form-label" for="confirm">Confirm Password</label>
                                <input style="border: 1px solid #dedede; border-radius: 5px" name="password_verify" type="password" id="confirm" class="form-control" />
                            </div>




                            <div class=" text-center text-lg-start mt-4 pt-2">
                                <button type="submit" class="btn btn-primary px-4">Register</button>
                                <p class="small mt-2 pt-1 mb-0">Already have an account? <a href="./login.php" class="link-danger">Login</a></p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script src="./user/js/script.js"></script>
</body>

</html>