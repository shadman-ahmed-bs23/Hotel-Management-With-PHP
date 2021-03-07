<?php

class RoomType extends DbConnect
{
    public function addRoomType($room_type, $bedding, $price)
    {
        $sql = "INSERT INTO room_type(room_type, bedding, price) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$room_type, $bedding, $price]);
    }

    public function getRoomType()
    {
        $sql = "SELECT * FROM room_type";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
}