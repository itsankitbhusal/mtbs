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
                                <div id="error" class="ml-4 alert alert-danger">
                                    <?php echo getError(); ?>
                                </div>
                            <?php endif; ?>



                            <!-- Email input -->
                            <div class="form-outline mt-2">
                                <label class="form-label" for="form3Example3">Email address</label>
                                <input style="border: 1px solid #dedede; border-radius: 5px" name="email" type="email" id="form3Example3" class="form-control " placeholder="Enter your email" />
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mt-4">
                                <label class="form-label" for="form3Example4">Password</label>
                                <input style="border: 1px solid #dedede; border-radius: 5px" id="input" name="password" type="password" id="form3Example4" class="form-control " placeholder="Enter password" />
                                <div class="form-check mt-2 mb-3">
                                    <input id="show" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Show Password
                                    </label>
                                </div>
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
        const eye = document.getElementById('show');

        eye.addEventListener('click', e => {
            const pass = document.getElementById('input');
            if (pass.type === "password") {
                pass.type = "text";
            } else if (pass.type === "text") {
                pass.type = "password"
            }
        });
    </script>
    <script src="./user/js/script.js"></script>
</body>

</html>