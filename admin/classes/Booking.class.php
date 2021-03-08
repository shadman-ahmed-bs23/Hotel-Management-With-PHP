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
}