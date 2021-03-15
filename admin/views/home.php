<?php

    session_start();

    if (!isset($_SESSION['user'])) {
        header("location: ./../index.php");
    }

?>
<?php
    require_once "./templates/header.php";
    require_once "./templates/navigation.php";
    require_once "./templates/sidenav.php";
    require_once "./../includes/class-autoload.inc.php";
?>

<div class="main">
    <h2>Content</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi deleniti
        molestias, voluptatem esse debitis quasi
        laborum tenetur dignissimos eveniet tempora ut, fugit temporibus
        suscipit aut officia animi assumenda dolore
        voluptas.</p>
</div>

<?php

    require_once "./templates/footer.php";

?>