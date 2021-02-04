<?php
class Booking{
    //conn
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    //Read SingleBooking
    public function readSingleBooking()
    {
        $query = "select Booking.student_ID, group_concat(Booking_Day.date, '') as single_day, count(Booking_Day.date) as count  from Booking join Booking_Day on Booking.ID = Booking_Day.booking_ID group by  Booking.student_ID";

        $result = $this->conn->query($query);

        return $result;
    }
}

?>