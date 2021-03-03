<?php

session_start();
include "./includes/class-autoload.inc.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $auth = new Auth();
    $admin = $auth->isAdmin();

    if ($admin) {
        $_SESSION['user'] = $username;
        header("location:home.php");
    } else {
        echo '<script>alert("Your Login Name or Password is invalid") </script>';
        header("location: index.php");
    }
}