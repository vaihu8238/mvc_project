<?php
    error_reporting(E_ERROR | E_PARSE);
    try {
        session_start();

        $_SESSION['is_admin_logged_in'] = false;
        $_SESSION['admin_logged_in_id'] = null;

        header('Location: index.php');
    } catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }
?>