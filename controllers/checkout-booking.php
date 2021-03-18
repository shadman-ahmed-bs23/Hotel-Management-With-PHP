<?php

include "./../includes/class-autoload.inc.php";

if ($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['checkoutBtn'])) {
    checkoutBooking();
}
function checkoutBooking()
{
    if (isset($_GET['checkoutBtn'])) {

        $ids = $_GET['checkoutBtn'];

        $str_arr = explode("+", $ids);
        $booking_id = (int) $str_arr[0];
        $room_id = (int) $str_arr[1];

        $booking = new Booking();
        $booking->checkoutBooking($booking_id);

        echo '<script>
            alert(' . $booking_id . ');
            window.location.href="../admin/views/bookingList.php";
            </script>';
    }
}