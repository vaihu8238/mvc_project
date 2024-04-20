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

        $amount = $_POST['amount'];

        $sql = "SELECT users.*, banks.*, users.name as user_name, banks.name as bank_name
            FROM users
            LEFT JOIN banks ON users.id = banks.user_id
            WHERE users.id = $logged_in_id
            LIMIT 1";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $bank_balance = "'" . ($row['balance'] - $amount) . "'";
        $wallet_balance = "'" . ($row['wallet_balance'] + $amount) . "'";

        $sql2 = "UPDATE `banks` SET `balance`= $bank_balance WHERE user_id=" . $logged_in_id;
        $result = mysqli_query($conn, $sql2);

        $sql3 = "UPDATE `users` SET `wallet_balance`= $wallet_balance WHERE id=" . $logged_in_id;
        $result = mysqli_query($conn, $sql3);

        $from_user_id = $logged_in_id;
        $amount_send = "'" . $_POST['amount'] . "'";
        $created_at = "'" . date('Y-m-d H:i:s') . "'";

        $sql4 = "INSERT INTO transactions (from_user_id, message, amount, status, created_at) VALUES ($from_user_id, 'Added from bank', $amount_send, 'received', $created_at)";
        $result4 = mysqli_query($conn, $sql4);

        $conn->close();

        header('Location: home.php');
    } catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }
?>