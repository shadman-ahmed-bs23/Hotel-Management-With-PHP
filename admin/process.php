<?php

include "./includes/class-autoload.inc.php";

$type = new RoomType();

if (isset($_POST['submit'])) {
    $roomType = $_POST['roomType'];
    $bedding = $_POST['bedding'];
    $price = $_POST['price'];

    $type->addRoomType($roomType, $bedding, $price);

    echo '<script>
    alert("Room Type Added Successfully");
    window.location.href="addRoomType.php";
    </script>';
    //echo '<script>alert("Room Type added successfully!")</script>';

    //header("location: {$_SERVER['HTTP_ORIGIN']}/hotel/admin/addRoomType.php");
}