<?php
    require_once "./templates/header.php";
    require_once "./templates/navigation.php";
    require_once "./includes/class-autoload.inc.php";

    $roomDescription = null;
    $room_id = null;

    if (isset($_GET['room_id'])) {
        $room_id = $_GET['room_id'];

        $roomObj = new Room();
        $room = $roomObj->getRoomWithId($room_id);

        $room_type_id = $room['room_type_id'];
        $room_number = $room['room_number'];

        $roomTypeObj = new RoomType();
        $roomType = $roomTypeObj->getRoomTypeWithId($room_type_id);

        $room_type = $roomType['room_type'];
        $bedding = $roomType['bedding'];
        $price = $roomType['price'];

        $roomDescription = "Room Number: " . $room_number . " -- " .
            $room_type .
            "(" . $bedding . ") - " . $price;
    }

?>

<div class="container mb-5 book-room animate__animated animate__fadeInLeft">
    <hr>
    <h2>Book a Room</h2>
    <hr>

    <div class="container booking-form mt-3 mb-3">
        <form action="./admin/booking.process.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name: </label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email: </label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone: </label>
                <input type="text" name="phone" class="form-control" id="phone">
            </div>
            <div class="mb-3">
                <label for="roomId" class="form-label">Room:</label>
                <select class="form-select" name="roomId">
                    <option value="<?=$room_id?>">
                        <?php
                            echo ($roomDescription) ? $roomDescription :
                            'Select a room';
                        ?>
                    </option>
                    <?php
                        $rooms = new Room();
                        if ($rooms->getAvailableRooms()) {
                            foreach ($rooms->getAvailableRooms() as
                                $room) {
                                echo "<option value=" . $room['room_id'] . ">"
                                    .
                                    "Room Number: " . $room['room_number'] .
                                    " -- " .
                                    $room['room_type'] . "(" .
                                    $room['bedding'] . ")" . " - " .
                                    $room['price'] . "$</option>";
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="checkIn" class="form-label">Check In Date: </label>
                <input type="datetime-local" name="checkIn" id="checkIn" class="form-control">
            </div>
            <div class="mb-3">
                <label for="checkOut" class="form-label">Check Out Date: </label>
                <input type="datetime-local" name="checkOut" id="checkOut" class="form-control">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>




<?php

    require_once "./templates/footer.php";

?>