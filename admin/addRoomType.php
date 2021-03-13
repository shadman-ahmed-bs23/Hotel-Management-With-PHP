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
    <hr>
    <h2>Add Room Types</h2>
    <hr>

    <div class="container room-type-form mt-3 mb-3">
        <form method="post" action="./process.php">
            <div class="mb-3">
                <label for="roomType" class="form-label">Room Type: </label>
                <input type="text" name="roomType" class="form-control" id="roomType">
            </div>
            <div class="mb-3">
                <label for="bedding" class="form-label">Bed Type: </label>
                <select class="form-select" aria-label="Default select example" name="bedding" id="bedding">
                    <option selected value="">Select a bed type</option>
                    <option value="Single">Single</option>
                    <option value="Double">Double</option>
                    <option value="Triple">Triple</option>
                    <option value="Quad">Quad</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price: </label>
                <input type="number" name="price" class="form-control" id="price">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <hr>
    <h3 class="mt-3">Available Types of Rooms: </h3>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Room Type</th>
                <th scope="col">Bed Type</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $types = new RoomType();
                if ($types->getRoomType()) {
                    foreach ($types->getRoomType() as $type) {
                        echo '<tr>';
                        echo "<td scope='col'>" . $type['id'] . "</td>";
                        echo "<td scope='col'>" . $type['room_type'] . "</td>";
                        echo "<td scope='col'>" . $type['bedding'] . "</td>";
                        echo "<td scope='col'>" . $type['price'] . "</td>";
                        echo '</tr>';
                    }
                }
            ?>

        </tbody>
    </table>
</div>

<?php

    require_once "./templates/footer.php";

?>