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
    <h2>Add a Room</h2>
    <hr>

    <div class="container add-room-form mt-5 mb-3">
        <form method="post" action="./room.process.php">

            <div class="mb-3" id="select_box">
                <label for="roomTypeId" class="form-label">Room Type: </label>
                <select onchange="fetch_select(this.value);" class="form-select" name="roomTypeId">
                    <option>
                        Select Room Type:
                    </option>
                    <?php
                        $types = new RoomType();
                        if ($types->getRoomType()) {
                            foreach ($types->getRoomType() as $type) {
                                echo "<option value=" . $type['id'] . ">" .
                                    $type['room_type'] . "(" .
                                    $type['bedding'] . ")" . " - " .
                                    $type['price'] . "$</option>";
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="roomNumber" class="form-label">Room Number: </label>
                <input type="text" name="roomNumber" class="form-control" id="roomNumber">
            </div>
            <div class="mb-3">
                <label for="floor" class="form-label">Floor: </label>
                <input type="text" name="floor" class="form-control" id="floor">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>

</div>

<?php

    require_once "./templates/footer.php";

?>