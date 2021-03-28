<?php
include "./../includes/class-autoload.inc.php";

class RoomController
{
    public function add()
    {
        $room = new Room();
        if (isset($_POST['submit'])) {
            $roomTypeId = $_POST['roomTypeId'];
            $floor = $_POST['floor'];
            $roomNumber = $_POST['roomNumber'];

            $room->addRoom($roomTypeId, $floor, $roomNumber);
        }
    }
}