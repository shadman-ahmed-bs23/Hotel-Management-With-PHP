<?php

class Room extends DbConnect
{
    public function addRoom($room_type_id, $floor, $room_number)
    {
        $sql = "INSERT INTO
                rooms(room_type_id, floor, room_number)
                VALUES(?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$room_type_id, $floor, $room_number]);
    }

    public function getRooms()
    {
        $sql = "SELECT *
                FROM rooms, room_type
                WHERE room_type.id = rooms.room_type_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function getAvailableRooms()
    {
        $sql = "SELECT *
                FROM rooms, room_type
                WHERE room_type.id = rooms.room_type_id
                AND rooms.available = 1";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function updateRoom($room_id)
    {
        $sql = "UPDATE rooms
                SET available = 0
                WHERE room_id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$room_id]);

    }
    public function getRoomWithId($room_id)
    {
        $sql = "SELECT * FROM rooms WHERE room_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$room_id]);
        $result = $stmt->fetch();

        return $result;
    }
    public function freeRoom($room_id)
    {
        $sql = "UPDATE rooms
                SET available = 1
                WHERE room_id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$room_id]);
    }
}