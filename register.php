<?php
require "./functions/db.php";
if (!empty($_POST)) {
    $name = request("name");
    $email = request("email");
    $password = request("password");
    $password_verify = request("password_verify");

    if (empty($email) || empty($password) || empty($name) || empty($password_verify)) {
        die("Please fill all the fields");
    }
    $user = where('user', 'email', '=', $email, false);
    if ($user) {
        die("Email has alreday been taken!");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Please enter valid email');
    }
    if ($password != $password_verify) {
        die("Password and Confirm password doesnot match!");
    }

    if (strlen($password) < 6) {
        die("Password must be 6 character or more");
    }

    create('user', [
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);

    die("User Registerd");
}

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

                        <form action="./register.php" method="POST">
                            <!-- Name input -->
                            <div class="form-outline">
                                <label class="form-label" for="name">Name</label>
                                <input style="border: 1px solid #dedede; border-radius: 5px" name="name" type="name" id="name" class="form-control " placeholder="Enter your name" />
                            </div>

                            <!-- Email input -->
                            <div class="form-outline">
                                <label class="form-label" for="form3Example3">Email address</label>
                                <input style="border: 1px solid #dedede; border-radius: 5px" name="email" type="email" id="form3Example3" class="form-control " placeholder="Enter your email" />
                            </div>

                            <!-- Password input -->
                            <div class="form-outline ">
                                <label class="form-label" for="form3Example4">Password</label>
                                <input style="border: 1px solid #dedede; border-radius: 5px" name="password" type="password" id="form3Example4" class="form-control " placeholder="Enter password" />
                            </div>
                            <!--Confirm Password input -->
                            <div class="form-outline ">
                                <label class="form-label" for="confirm">Confirm Password</label>
                                <input style="border: 1px solid #dedede; border-radius: 5px" name="password_verify" type="password" id="confirm" class="form-control " placeholder="Confirm password" />
                            </div>




                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" class="btn btn-primary px-4">Register</button>
                                <p class="small mt-2 pt-1 mb-0">Already have an account? <a href="./login.php" class="link-danger">Login</a></p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
</body>

</html>