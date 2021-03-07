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

<div class="main animate__animated animate__fadeInLeft">
    <h2>Add Room Types</h2>

    <hr>

    <div class="container room-type-form mt-5 ">


        <form method="post" action="./process.php">
            <div class="mb-3">
                <label for="roomType" class="form-label">Room Type: </label>
                <input type="text" name="roomType" class="form-control" id="roomType">
            </div>
            <div class="mb-3">
                <label for="bedding" class="form-label">Bed Type: </label>
                <input type="text" name="bedding" class="form-control" id="bedding">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price: </label>
                <input type="number" name="price" class="form-control" id="price">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <h3 class="mt-3">Available Types of Rooms: </h3>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>

        </tbody>
    </table>
</div>

<?php

    require_once "./templates/footer.php";

?>