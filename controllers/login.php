<?php

    include "./../includes/class-autoload.inc.php";

    session_start();

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $auth = new Auth();
        $admin = $auth->isAdmin();

        if ($admin) {
            $_SESSION['user'] = $username;
            header("location: ./../admin/views/home.php");
        } else {
        ?>

<script>
alert("Wrong Login Credentials");
window.location.href = "../admin/views/index.php";
</script>

<?php
    }
}
?>