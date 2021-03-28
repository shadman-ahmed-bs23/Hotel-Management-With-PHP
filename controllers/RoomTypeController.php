<?php
include "./../includes/class-autoload.inc.php";

class RoomTypeController
{
    public function add()
    {
        $type = new RoomType();
        if (isset($_POST['submit'])) {
            $roomType = $_POST['roomType'];
            $bedding = $_POST['bedding'];
            $price = $_POST['price'];

            $type->addRoomType($roomType, $bedding, $price);
        }
    }
}