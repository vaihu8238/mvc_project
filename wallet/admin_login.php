<?php
    error_reporting(E_ERROR | E_PARSE);
    try {
        include "db.php";
        session_start();

        $is_admin_logged_in = $_SESSION['is_admin_logged_in'];
        $admin_logged_in_id = $_SESSION['admin_logged_in_id'];

        if(($is_admin_logged_in)){
            header('Location: dashboard.php');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT *  FROM users WHERE email = '$email' AND password = '$password' AND role = 'admin' LIMIT 1";

            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            if($count == 1){
                $_SESSION['is_admin_logged_in'] = true;
                $_SESSION['admin_logged_in_id'] = $row['id'];

                header('Location: dashboard.php');
            } else {
              $_SESSION['error'] = "Inavlid email or password";
            }

            $conn->close();
        }
    } catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EWALLET</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>


    <style>
        body{
            background-image: url('http://localhost/project/backgroundimg1.jpg');
            background-size: cover;
        }
        .bg {
            background-color: rgba(0, 0, 0, 0.6);
        }
        img{
            height: 200px;
            width: 400px;
        }

        .margin-top-10 {
            margin-top: 10% !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-white shadow rounded margin-top-10 py-4">
                <div class="text-center">
                    <a href="/">
                        <div class="mb-4">
                            <h1>ADMIN</h1>
                        </div>
                    </a>

                    <h1 class="my-4">Login</h1>
                </div>
                <hr class="bg-light">
                <div class="my-4">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form action="admin_login.php" method="post">
                                <div>
                                    <div>
                                        <?php if($_SESSION['error']) { ?>
                                            <div class="alert alert-danger">
                                                <?php
                                                    echo $_SESSION['error'];
                                                ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div>
                                        <label for="">Email</label>
                                        <input type="text" class="form-control mb-2" name="email" id="" placeholder="Email" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control mb-2" name="password" id="" placeholder="Password" required>
                                    </div>
                                    <div class="mb-2">
                                        <button type="submit" class="btn btn-primary w-100">Login</button>
                                    </div>
                                    <div class="text-end mb-2">
                                        <div class="text-primary small">
                                            <a href="forgot_password.php">Forgot password?</a>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>y