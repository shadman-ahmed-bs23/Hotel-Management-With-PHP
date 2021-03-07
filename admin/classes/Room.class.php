<?php

class Room extends DbConnect
{
    public function addRoom($room_type_id, $floor, $room_number)
    {

        $sql =

            "Insert INTO rooms(room_type_id, floor, room_number) VALUES(?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$room_type_id, $floor, $room_number]);
    }

}