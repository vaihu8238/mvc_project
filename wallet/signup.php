<?php
    try {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $n=8;
            function getName($n) {
                $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $randomString = '';

                for ($i = 0; $i < $n; $i++) {
                    $index = rand(0, strlen($characters) - 1);
                    $randomString .= $characters[$index];
                }

                return $randomString;
            }

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "wallet";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $name = "'" . $_POST['name'] . "'";
            $email = "'" . $_POST['email'] . "'";
            $password = "'" . $_POST['password'] . "'";
            $confirmpwd= "'" . $_POST['confirm_password'] . "'";
            $role = "'" . $_POST['role'] . "'";
            $shop_name = "'" . $_POST['shop_name'] . "'";
            $created_at = "'" . date("Y-m-d H:i:s") . "'";
            $wallet_id = "'" . getName(8) . "'";
            $wallet_balance = '0';
            if($password===$confirmpwd){
            $sql = "INSERT INTO users (name, shop_name, wallet_id, wallet_balance, email, password, role, created_at) VALUES ($name, $shop_name, $wallet_id, $wallet_balance, $email, $password, $role, $created_at)";

            if(mysqli_query($conn, $sql)){
                session_start();

                $_SESSION['is_logged_in'] = true;
                $_SESSION['logged_in_id'] = $conn->insert_id;

                header('Location: home.php');
            } 
            else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                echo '<script>
                alert("Password and confirm password must be same!!!!!");
                // window.location="home.php";
                </script>';
            }
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
    <title>E-Wallet</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>


    <style>
        body{
            background-image: url('img/ewallet.jpg');
            background-size: cover;
        }
        .bg {
            background-color: rgba(0, 0, 0, 0.6);
        }
        img{
            height: 200px;
            width: 400px;
        }

        .margin-top-5 {
            margin-top: 2% !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-white shadow rounded margin-top-5 py-4">
                <div class="text-center">
                    <a href="/">
                        <div class="mb-2">
                            <h1>E-Wallet</h1>
                        </div>
                    </a>

                    <h1>Signup</h1>
                </div>
                <hr class="bg-light">
                <div>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form action="#" method="POST" id="signup_form">
                                <div>
                                    <div>
                                        <label for="">Name</label>
                                        <input type="text" class="form-control mb-2" name="name" id="" placeholder="Name" required>
                                    </div>
                                    <div>
                                        <label for="">Role</label>
                                        <select class="form-control" name="role" id="role" required>
                                            <option value="user">User</option>
                                            <option value="seller">Seller</option>
                                        </select>
                                    </div>
                                    <div class="seller_div d-none">
                                        <div>
                                            <label for="">Shop Name</label>
                                            <input type="text" class="form-control mb-2" name="shop_name" id="shop_name" placeholder="Shop Name">
                                            <div id="shop_error_parent"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="">Email</label>
                                        <input type="email" class="form-control mb-2" name="email" id="" placeholder="Email" required>
                                    </div>
                                    <div>
                                        <label for="">Password</label>
                                        <input type="password" class="form-control mb-2" name="password" id="" placeholder="Password">
                                    </div>
                                    <div class="mb-4">
                                        <label for="">Confirm Password</label>
                                        <input type="password" class="form-control mb-2" name="confirm_password" id="" placeholder="Confirm Password" required>
                                    </div>
                                    <div class="mb-4">
                                        <button class="btn btn-primary w-100">Signup</button>
                                    </div>
                                    <div>
                                        <span>You have already an account?</span>
                                        <a href="login.php">Login</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
        $(function(){
            $(document).on('change', '#role', function(){
                $(document).find('#shop_name').val('');

                if($(this).val() == 'seller'){
                    $('.seller_div').removeClass('d-none');
                } else {
                    $('.seller_div').addClass('d-none');
                }
            });

            $(document).on('submit', '#signup_form', function(e){
                $(document).find('#shop_error_parent').empty();

                var role = $(document).find('#role').val();
                var shop_name = $(document).find('#shop_name').val();

                if(role == 'seller' && shop_name == ''){
                    $(document).find('#shop_error_parent').html(
                        '<p class="text-danger">Please enter shop name</p>'
                    );

                    return false;
                }

                return true;
            });
        });
    </script>
</body>
</html>