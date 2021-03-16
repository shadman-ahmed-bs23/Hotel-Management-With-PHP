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
    require_once "../includes/class-autoload.inc.php";

    //fetching all available rooms
    $room = new Room();
    $data = $room->getAvailableRooms();

    function createOption($room_number, $room_type, $bedding, $price)
    {
        return "Room Number: " . $room_number . " -- " .
            $room_type . "(" . $bedding . ")" . " - " .
            $price . "$";
    }

?>

<div class="main animate__animated animate__fadeInLeft">
    <hr>
    <h2>Book a Room</h2>
    <hr>

    <div class="container booking-form mt-3 mb-3">
        <form action="./../../controllers/create-booking.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name: </label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email: </label>
                <input type="email" name="email" class="form-control"
                    id="email">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone: </label>
                <input type="text" name="phone" class="form-control" id="phone">
            </div>
            <div class="mb-3">
                <label for="roomId" class="form-label">Room:</label>
                <select class="form-select" name="roomId">
                    <option>
                        Select a room
                    </option>

                    <?php foreach ($data as $room) {?>
                    <option value="<?=$room['room_id']?>">
                        <?php
                            $desc = createOption($room['room_number'],
                                $room['room_type'], $room['bedding'],
                                $room['price']);

                                echo $desc;
                            ?>
                    </option>
                    <?php }?>

                </select>
            </div>
            <div class="mb-3">
                <label for="checkIn" class="form-label">Check In Date: </label>
                <input type="datetime-local" name="checkIn" id="checkIn"
                    class="form-control">
            </div>
            <div class="mb-3">
                <label for="checkOut" class="form-label">Check Out Date:
                </label>
                <input type="datetime-local" name="checkOut" id="checkOut"
                    class="form-control">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">
                Submit
            </button>
        </form>
    </div>
</div>

<?php

    require_once "./templates/footer.php";

?>