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

    public function readMultipleBooking()
    {
        $query = "select Booking.student_ID,Booking_Extra.start_date, Booking_Extra.end_date ,concat_ws(' , ',Booking_Extra.monday, Booking_Extra.tuesday, Booking_Extra.wednesday,Booking_Extra.thursday,Booking_Extra.friday) as days from Booking inner join Booking_Extra on Booking.ID = Booking_Extra.booking_ID and date( end_date ) >= CURDATE()  group by  Booking.student_ID, Booking_Extra.start_date, Booking_Extra.end_date, days";

        $result = $this->conn->query($query);

        return $result;
    }
}

?>