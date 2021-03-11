<div class="roomStatus mt-3">

    <hr>
    <h3>Room Status</h3>
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
                        echo "<td scope='col'>" . $room['room_number']
                            .
                            "</td>";
                        echo "<td scope='col'>" . $room['floor'] .
                            "</td>";
                        echo "<td scope='col'>" . $room['room_type'] .
                            "</td>";
                        echo "<td scope='col'>" . $room['bedding'] .
                            "</td>";
                        echo "<td scope='col'>" . $room['price'] .
                            "</td>";
                        echo "<td scope='col'>" . ($room['available']
                            ? 'Yes'
                            : 'No') .
                            "</td>";
                        echo
                            "<td>
                                <a  href='bookRoom.php?room_id=" .
                            $room['room_id']
                            . "' class='btn btn-warning mt-3'>Book</a>
                            </td>";

                        echo '</tr>';
                    }
                }
            ?>

        </tbody>
    </table>

</div>