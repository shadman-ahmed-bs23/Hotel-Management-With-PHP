<?php

class Booking extends DbConnect
{
    public function addBooking($room_id, $name, $email, $phone, $check_in,
        $check_out, $total_days, $payment_id) {
        $sql =

            "INSERT INTO booking(room_id, name, email, phone, check_in, check_out, total_days, payment_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$room_id, $name, $email, $phone, $check_in,
            $check_out, $total_days, $payment_id]);
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

    public function checkoutBooking($booking_id, $check_out, $total_days,
        $days_num, $cost) {
        $sql = "UPDATE booking
        SET checked_out = 1, check_out = ?, total_days = ?, days_num = ?, cost = ?
        WHERE booking_id=?";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$check_out, $total_days, $days_num, $cost,
            $booking_id]);
    }

    public function getBookingWithId($booking_id)
    {
        $sql = "SELECT * FROM booking WHERE booking_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$booking_id]);
        $result = $stmt->fetch();

        return $result;
    }
}