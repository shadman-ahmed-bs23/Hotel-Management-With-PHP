<?php

include "./includes/class-autoload.inc.php";

$room = new Room();

if (isset($_POST['submit'])) {
    $roomTypeId = $_POST['roomTypeId'];
    $floor = $_POST['floor'];
    $roomNumber = $_POST['roomNumber'];

    $room->addRoom($roomTypeId, $floor, $roomNumber);

    echo '<script>
    alert("Room Added Successfully");
    window.location.href="addRoom.php";
    </script>';
    echo '<script>alert("Room Type added successfully!")</script>';

    //header("location: {$_SERVER['HTTP_ORIGIN']}/hotel/admin/addRoomType.php");
}