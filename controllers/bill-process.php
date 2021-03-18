<?php

include "./../includes/class-autoload.inc.php";

if ($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['showBillBtn'])) {
    $ids = $_GET['showBillBtn'];

    $bookingObj = new Booking();
    $roomObj = new Room();
    $roomTypeObj = new RoomType();

    $str_arr = explode("+", $ids);
    $booking_id = (int) $str_arr[0];
    $room_id = (int) $str_arr[1];

    $room = $roomObj->getRoomWithId($room_id);
    $room_type_id = $room['room_type_id'];
    $room_number = $room['room_number'];

    $roomType = $roomTypeObj->getRoomTypeWithId($room_type_id);
    $price = $roomType['price'];
    $room_type = $roomType['room_type'];

    $booking = $bookingObj->getBookingWithId($booking_id);

    $name = $booking['name'];
    $email = $booking['email'];
    $phone = $booking['phone'];
    $check_in = $booking['check_in'];
    $check_out = $booking['check_out'];
    $days_num = $booking['days_num'];
    $bill_id = $booking['payment_id'];
    $total_cost = $booking['cost'];
    $cost_per_day = $total_cost / $days_num;

}