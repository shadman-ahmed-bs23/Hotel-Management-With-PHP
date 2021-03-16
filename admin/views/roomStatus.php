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

    //fetching all rooms
    $room = new Room();
    $data = $room->getRooms();
?>

<div class="main mb-5 animate__animated animate__fadeInLeft">
    <hr>
    <h2>Room Status</h2>
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

                <td>
                    <a href="edit.php">
                        <svg class="edit-icon"
                            xmlns="http://www.w3.org/2000/svg" width="20"
                            height="20" fill="currentColor"
                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                    </a>
                    <a href="delete.php">
                        <svg class="delete-icon"
                            xmlns="http://www.w3.org/2000/svg" width="20"
                            height="20" fill="currentColor" class="bi bi-trash"
                            viewBox="0 0 16 16">
                            <path
                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                            <path fill-rule="evenodd"
                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                        </svg>
                    </a>
                </td>

            </tr>
            <?php }?>

        </tbody>
    </table>
</div>

<?php

    require_once "./templates/footer.php";

?>