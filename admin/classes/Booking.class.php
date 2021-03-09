<?php

class Booking extends DbConnect
{
    public function addBooking($room_id, $name, $email, $phone, $check_in,
        $check_out, $total_days) {
        $sql =

            "INSERT INTO booking(room_id, name, email, phone, check_in, check_out, total_days) VALUES(?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$room_id, $name, $email, $phone, $check_in,
            $check_out, $total_days]);
    }
    public function getBookings()
    {
        $sql = "SELECT *
        FROM booking, rooms
        WHERE booking.room_id = rooms.room_id";
        //$sql = "SELECT * FROM rooms";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }

    public function updateBooking($booking_id)
    {
        $sql = "UPDATE booking
        SET confirmed = 1
        WHERE booking_id=?";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$booking_id]);

    }
}