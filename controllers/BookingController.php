<?php
include "./../includes/class-autoload.inc.php";

class BookingController
{
    public function add()
    {
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
            $paymentId = rand(100000, 9999999);

            $booking->addBooking(
                $roomId,
                $name,
                $email,
                $phone,
                $checkIn,
                $checkOut,
                $totalDays,
                $paymentId
            );
        }
    }

    public function checkout()
    {
        $bookingObj = new Booking();
        $roomObj = new Room();
        $roomTypeObj = new RoomType();
        if (isset($_GET['checkoutBtn'])) {
            $ids = $_GET['checkoutBtn'];
            $str_arr = explode("+", $ids);
            $booking_id = (int) $str_arr[0];
            $room_id = (int) $str_arr[1];

            $room = $roomObj->getRoomWithId($room_id);
            $roomTypeId = $room['room_type_id'];

            $roomType = $roomTypeObj->getRoomTypeWithId($roomTypeId);
            $price = $roomType['price'];

            $booking = $bookingObj->getBookingWithId($booking_id);

            date_default_timezone_set('Asia/Dhaka');
            $temp = $booking['check_in'];
            $checkIn = str_replace("T", " ", $temp);
            //echo $checkIn . "<br>";
            $checkOut = date("Y-m-d H:i");
            $checkOutString = date("Y-m-d") . "T" . date("H:i");
            //echo $checkOut . "<br>";
            $d1 = date_create($checkIn, timezone_open("Asia/Dhaka"));
            $d2 = date_create($checkOut, timezone_open("Asia/Dhaka"));

            $difference = date_diff($d1, $d2); // Total Booking days;
            $totalDays = $difference->format('%d days');
            $daysNum = (int) $totalDays;

            $cost = $price * $daysNum;

            $bookingObj->checkoutBooking(
                $booking_id,
                $checkOutString,
                $totalDays,
                $daysNum,
                $cost
            );

            $roomObj->freeRoom($room_id);
        }
    }

    public function confirm()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" and
            isset($_POST['confirmBtn'])) {

            $ids = $_POST['confirmBtn'];

            $str_arr = explode("+", $ids);
            $booking_id = (int) $str_arr[0];
            $room_id = (int) $str_arr[1];

            $booking = new Booking();
            $booking->updateBooking($booking_id);

            $room = new Room();
            $room->updateRoom($room_id);
        }
    }
}