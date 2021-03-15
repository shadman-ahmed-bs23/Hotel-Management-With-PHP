<?php

    include "./../includes/class-autoload.inc.php";

    $room = new Room();

    if (isset($_POST['submit'])) {
        $roomTypeId = $_POST['roomTypeId'];
        $floor = $_POST['floor'];
        $roomNumber = $_POST['roomNumber'];

        $room->addRoom($roomTypeId, $floor, $roomNumber);
    }

?>

<script>
alert("Room Added Successfully");
window.location.href = "../admin/views/addRoom.php";
</script>