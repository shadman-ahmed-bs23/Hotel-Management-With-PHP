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

    public function getRooms()
    {
        $sql = "SELECT *
        FROM rooms, room_type
        WHERE room_type.id = rooms.room_type_id";
        //$sql = "SELECT * FROM rooms";

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
        //$sql = "SELECT * FROM rooms";

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
}