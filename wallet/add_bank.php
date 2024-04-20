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

        if($_POST['name'] = 'BOB Bank') {
            $ifsc_code = 'BOB8888';
        } elseif ($_POST['name'] = 'HDFC Bank') {
            $ifsc_code = 'HDFC8888';
        } elseif ($_POST['name'] = 'CANARA Bank') {
            $ifsc_code = 'CANARA8888';
        } elseif ($_POST['name'] = 'SBI Bank') {
            $ifsc_code = 'SBI8888';
        } else {
            $ifsc_code = 'BANK8888';
        }

        $user_id = $logged_in_id;
        $name = "'" . $_POST['name'] . "'";
        $account_number = "'" . $_POST['account_number'] . "'";
        $balance = "'" . 5000 . "'";
        $ifsc = "'" . $ifsc_code . "'";
        $created_at = "'" . date('Y-m-d H:i:s') . "'";

        $sql = "INSERT INTO banks (user_id, name, account_number, ifsc, balance, created_at) VALUES ($user_id, $name, $account_number, $ifsc, $balance, $created_at)";
        $result = mysqli_query($conn, $sql);

        $conn->close();

        header('Location: home.php');
    } catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }
?>