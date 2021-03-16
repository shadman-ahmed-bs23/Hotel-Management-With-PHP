<?php
    require_once "./templates/header.php";
    require_once "./templates/navigation.php";
    require_once "../includes/class-autoload.inc.php";

    //fetching all rooms
    $room = new Room();
    $data = $room->getRooms();

?>

<div class="container roomStatus mt-3">

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
            <?php foreach ($data as $room) {?>
            <tr>
                <td scope='col'><?php echo $room['room_id'] ?></td>
                <td scope='col'><?php echo $room['room_number'] ?></td>
                <td scope='col'><?php echo $room['floor'] ?></td>
                <td scope='col'><?php echo $room['room_type'] ?></td>
                <td scope='col'><?php echo $room['bedding'] ?></td>
                <td scope='col'><?php echo $room['price'] ?></td>

                <?php if ($room['available']): ?>
                <td scope='col'>Yes</td>
                <?php else: ?>
                <td scope='col'>No</td>
                <?php endif;?>

                <?php if ($room['available']):
                    ?>
                <td scope='col'>
                    <a href='bookRoom.php?room_id=<?=$room['room_id']?>'
                        class='btn btn-warning'>
                        Book
                    </a>
                </td>
                <?php else: ?>
                <td scope='col'>Booking Not Available</td>
                <?php endif;?>
            </tr>
            <?php }?>

        </tbody>
    </table>

</div>


<?php

    require_once "./templates/footer.php";

?>