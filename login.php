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
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="./user/css/mdb.min.css">
</head>

<body id="page-top">
    <section class="">
        <div class="container-fluid ">
            <div>
                <div class="vh-100 d-flex align-items-center justify-content-center">
                    <div>
                        <h1 class="h3 mb-4 text-gray-800">Login</h1>

                        <form action="./loginphp.php" method="POST">
                            <!-- error -->
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

                            <!-- Email input -->
                            <div class="form-outline mt-2">
                                <label class="form-label" for="form3Example3">Email address</label>
                                <input style="border: 1px solid black;" name="email" type="email" id="form3Example3" class="form-control " placeholder="Enter your email" />
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mt-4">
                                <label class="form-label" for="form3Example4">Password</label>
                                <input style="border: 1px solid black;" id="input" name="password" type="password" id="form3Example4" class="form-control " placeholder="Enter password" />
                                <a href="#!" class="d-flex justify-content-end" onclick="showPass()"><i class="fas fa-eye"></i></a>
                            </div>
                            <div class="text-center text-lg-start pt-2">
                                <button type="submit" class="btn btn-primary px-4">Login</button>
                                <p class="small mt-2 pt-1 mb-0">Don't have an account? <a href="./register.php" class="link-danger">Register</a></p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script>
        function showPass() {
            let variable = document.getElementById("input");
            if (variable.type === "password") {
                variable.type = "text";
            } else if (variable.type === "text") {
                variable.type = "password"
            }
        }
    </script>
</body>

</html>