<?php

    session_start();

    if (!isset($_SESSION['user'])) {
        header("location: index.php");
    }

?>
<?php
    require_once "./templates/header.php";
    require_once "./templates/navigation.php";
    require_once "./templates/sidenav.php";
    require_once "./includes/class-autoload.inc.php";

?>

<div class="main">
    <h2>Book a Room</h2>
</div>

<?php

    require_once "./templates/footer.php";

?>