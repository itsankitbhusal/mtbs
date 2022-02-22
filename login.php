<?php
require "./functions/db.php";
if (!empty($_POST)) {
    $email = request("email");
    $password = request("password");

    if (empty($email) || empty($password)) {
        die("Please fill all the fields");
    }

    $user = where('user', 'email', '=', $email, false);

    if (empty($user)) {
        die("No user found with given email address");
    }

    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        if ($user['role'] == "admin") {
            header("Location: ./admin/index.php");
        } else {
            header("Location: home.php");
        }
    } else {
        die("Invalid email or password");
    }
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
    <title>Login</title>

    <link rel="stylesheet" href="./admin/css/bootstrap.min.css">
</head>

<body id="page-top">
    <section class="">
        <div class="container-fluid ">
            <div>
                <div class="vh-100 d-flex align-items-center justify-content-center">
                    <div>
                        <h1 class="h3 mb-4 text-gray-800">Login</h1>

                        <form action="./login.php" method="POST">
                            <!-- Email input -->
                            <div class="form-outline">
                                <label class="form-label" for="form3Example3">Email address</label>
                                <input name="email" type="email" id="form3Example3" class="form-control " placeholder="Enter your email" />
                            </div>

                            <!-- Password input -->
                            <div class="form-outline ">
                                <label class="form-label" for="form3Example4">Password</label>
                                <input name="password" type="password" id="form3Example4" class="form-control " placeholder="Enter password" />
                            </div>
                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" class="btn btn-primary px-4">Login</button>
                                <p class="small mt-2 pt-1 mb-0">Don't have an account? <a href="./register.php" class="link-danger">Register</a></p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
</body>

</html>