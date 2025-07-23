<?php
    session_start();
    if ($_SESSION && $_SESSION['fullname'] && $_GET && $_GET['type'] === "logout"){
        session_destroy();
        $_SESSION = [];
        header("location: index.php");
    }
?>