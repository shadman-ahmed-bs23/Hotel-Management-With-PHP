<?php

    session_start();

    if (isset($_SESSION['user'])) {
        header("location: home.php");
    } else {
        header("location: index.php");
    }

?>
<?php
    require_once "./templates/header.php";
    require_once "./templates/navigation.php";
    require_once "./includes/class-autoload.inc.php";
?>

<div class="container">
    Front Page
</div>

<?php

    require_once "./templates/footer.php";

?>