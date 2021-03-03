<?php

    session_start();

    if (isset($_SESSION['user'])) {
        header("location: home.php");
    }

?>

<?php
    require_once "./templates/header.php";
    require_once "./templates/navigation.php";
    require_once "./includes/class-autoload.inc.php";
?>
<div class="container form-div mt-5 animate__animated animate__fadeInDown">

    <h3 class="text-center">Admin Login</h3>
    <form method="post" action="login.php">
        <div class="mb-3">
            <label for="name" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="name">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php

    require_once "./templates/footer.php";

?>