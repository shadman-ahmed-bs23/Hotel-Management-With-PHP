<?php

include "./includes/class-autoload.inc.php";

$booking = new Booking();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $roomId = $_POST['roomId'];
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    $d1 = new DateTime($checkIn);
    $d2 = new DateTime($checkOut);
    $difference = $d1->diff($d2); // Total Booking days;
    $totalDays = $difference->format('%m months, %d days');

    $booking->addBooking($roomId, $name, $email, $phone, $checkIn, $checkOut,
        $totalDays);

    var_dump($totalDays);

    echo '<script>
    alert("Booking Added Successfully");
    window.location.href="bookRoom.php";
    </script>';
    // echo '<script>alert("Room Type added successfully!")</script>';

    //header("location: {$_SERVER['HTTP_ORIGIN']}/hotel/admin/addRoomType.php");
}