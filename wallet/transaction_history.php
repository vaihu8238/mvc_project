<?php
    try {
        session_start();

        $is_logged_in = $_SESSION['is_logged_in'];
        $logged_in_id = "'" . $_SESSION['logged_in_id'] . "'";

        if(!($is_logged_in)){
            header('Location: login.php');
        }

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "wallet";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT users.*, banks.*, users.name as user_name, banks.name as bank_name
            FROM users
            LEFT JOIN banks ON users.id = banks.user_id
            WHERE users.id = $logged_in_id
            LIMIT 1";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $sql2 = "SELECT *  FROM `transactions` WHERE `from_user_id` = $logged_in_id ORDER BY id DESC";

        $result2 = mysqli_query($conn, $sql2);

        $conn->close();
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
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="m-2 p-2 bg-light rounded">
            <div class="row align-items-center">
                <div class="col-md-2">
                    <div>
                        <a href="/">
                            <div>
                                <h1>E-Wallet</h1>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-7"></div>
                <div class="col-md-3">
                    <div>
                        <div class="fs-5">
                            My Wallet ID: <span><strong>
                            <?php echo $row['wallet_id'] ?>
                            </strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="m-2 p-2">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="bg-light rounded p-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="fw-bold">
                                Transation History
                            </div>
                            <div>
                                <a class="btn btn-primary btn-sm" href="home.php">Back to home</a>
                            </div>
                        </div>
                        <hr>

                        <div>
                            <?php
                                if ($result2->num_rows > 0) {
                                    while($item = $result2->fetch_assoc()) {
                                        if($item['status'] == 'paid'){
                                            echo '<div class="p-2 rounded alert-danger mb-2">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <div>
                                                    ' . $item['message'] . '
                                                    </div>
                                                    <div>
                                                    ' . $item['amount'] . '
                                                    </div>
                                                </div>
                                                <div class="small text-end text-dark">2023-01-01 10:00:00</div>
                                            </div>';
                                        } else {
                                            echo '<div class="p-2 rounded alert-success mb-2">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <div>
                                                        ' . $item['message'] . '
                                                    </div>
                                                    <div>
                                                    ' . $item['amount'] . '
                                                    </div>
                                                </div>
                                                <div class="small text-end text-dark">
                                                ' . $item['created_at'] . '
                                                </div>
                                            </div>';
                                        }
                                    }
                                } else {
                                    echo "No transactions";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>