<?php
    session_start();

    $_SESSION['is_logged_in'] = false;
    $_SESSION['logged_in_id'] = null;

    header('Location: login.php');
?>