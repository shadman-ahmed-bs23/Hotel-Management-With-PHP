<?php

class RoomType extends DbConnect
{
    public function addRoomType($room_type, $bedding, $price)
    {
        $sql = "INSERT INTO
                room_type(room_type, bedding, price)
                VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$room_type, $bedding, $price]);
    }

    public function getRoomType()
    {
        $sql = "SELECT * FROM room_type ORDER BY room_type ASC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }

    public function getRoomTypeWithId($room_type_id)
    {
        $sql = "SELECT * FROM room_type WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$room_type_id]);

        $result = $stmt->fetch();
        return $result;
    }
}