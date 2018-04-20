<?php session_start();

    if (isset($_SESSION['usuario'])) {
        header('Location: home.php');
    }
    else {
        header('Location: login.php');
    }

?>