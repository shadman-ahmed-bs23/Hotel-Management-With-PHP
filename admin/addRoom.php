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

    <div class="container add-room-form mt-3 mb-3">
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

    <hr>
    <h3 class="mt-3">Available Types of Rooms: </h3>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Room Number</th>
                <th scope="col">Floor</th>
                <th scope="col">Room Type</th>
                <th scope="col">Bed Type</th>
                <th scope="col">Price</th>
                <th scope="col">Availability</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $rooms = new Room();
                if ($rooms->getRooms()) {
                    foreach ($rooms->getRooms() as $room) {
                        echo '<tr>';
                        echo "<td scope='col'>" . $room['room_id'] .
                            "</td>";
                        echo "<td scope='col'>" . $room['room_number'] .
                            "</td>";
                        echo "<td scope='col'>" . $room['floor'] .
                            "</td>";
                        echo "<td scope='col'>" . $room['room_type'] .
                            "</td>";
                        echo "<td scope='col'>" . $room['bedding'] . "</td>";
                        echo "<td scope='col'>" . $room['price'] .
                            "</td>";
                        echo "<td scope='col'>" . ($room['available'] ? 'Yes'
                            : 'No') .
                            "</td>";
                        echo
                            '<td>
                                <a href="edit.php"><svg class="edit-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg></a>
                                <a href="delete.php"><svg class="delete-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg></a>
                            </td>';

                        echo '</tr>';
                    }
                }
            ?>

        </tbody>
    </table>
    <button>
        <ion-icon name="create-outline"></ion-icon>
    </button>

</div>

<?php

    require_once "./templates/footer.php";

?>