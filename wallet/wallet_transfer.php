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

        $wallet_id = "'" . $_POST['wallet_id'] . "'";
        $amount = "'" . $_POST['amount'] . "'";

        $sql = "SELECT *
            FROM users
            WHERE id = $logged_in_id
            LIMIT 1";

        $result = mysqli_query($conn, $sql);
        $from_user = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $sql2 = "SELECT *
            FROM users
            WHERE wallet_id = $wallet_id
            LIMIT 1";

        $result2 = mysqli_query($conn, $sql2);
        $to_user = mysqli_fetch_array($result2, MYSQLI_ASSOC);

        $from_user_amount = "'" . ($from_user['wallet_balance'] - $_POST['amount']) . "'";
        $to_user_amount = "'" . ($to_user['wallet_balance'] + $_POST['amount']) . "'";

        $sql3 = "UPDATE `users` SET `wallet_balance`= $from_user_amount WHERE id = " . $logged_in_id;
        $result3 = mysqli_query($conn, $sql3);

        $sql4 = "UPDATE `users` SET `wallet_balance`= $to_user_amount WHERE wallet_id = " . $wallet_id;
        $result4 = mysqli_query($conn, $sql4);

        $from_user_id = $logged_in_id;
        $to_user_id = "'" . $to_user['id'] . "'";
        $amount_send = "'" . $_POST['amount'] . "'";
        $created_at = "'" . date('Y-m-d H:i:s') . "'";

        $sql5 = "INSERT INTO transactions (from_user_id, to_user_id, message, amount, status, created_at) VALUES ($from_user_id, $to_user_id, 'Paid', $amount_send, 'paid', $created_at)";
        $result5 = mysqli_query($conn, $sql5);

        $sql6 = "INSERT INTO transactions (from_user_id, to_user_id, message, amount, status, created_at) VALUES ($to_user_id, $from_user_id, 'Received', $amount_send, 'received', $created_at)";
        $result6 = mysqli_query($conn, $sql6);

        $conn->close();

        header('Location: home.php');
    } catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }
?>