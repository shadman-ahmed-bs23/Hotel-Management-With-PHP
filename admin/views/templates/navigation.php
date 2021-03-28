<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="./">
            <h4>Admin Panel</h4>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="../../index.php">HomePage</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php if (isset($_SESSION['user']) &&
                        !empty($_SESSION['user'])) {
                    ?>

                <li class="nav-item">
                    <a class="nav-link"
                        href="../../process/logout.php">Logout</a>
                </li>
                <?php } else {?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Login</a>
                </li>
                <?php }?>
            </ul>

        </div>
    </div>
</nav>