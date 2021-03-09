<?php
class Booking
{
    //conn
    private $conn;
    private $date;
    private $username;
    private $dow;
    private $sum;
    private $sumd;
    private $sumn;
    private $name;
    private $last_name;
    private $ID;

    function getID()
    {
        return $this->ID;
    }

    function setID($ID): void
    {
        $this->ID = $ID;
    }

    function getName()
    {
        return $this->name;
    }

    function setName($name): void
    {
        $this->name = $name;
    }
    function getLast_name()
    {
        return $this->last_name;
    }

    function setLast_name($last_name): void
    {
        $this->last_name = $last_name;
    }

    function getSum()
    {
        return $this->sum;
    }
    function getSumd()
    {
        return $this->sumd;
    }
    function getSumn()
    {
        return $this->sumn;
    }

    function setSum($sum): void
    {
        $this->sum = $sum;
    }
    function setSumd($sumd): void
    {
        $this->sumd = $sumd;
    }
    function setSumn($sumn): void
    {
        $this->sumn = $sumn;
    }

    function getDow()
    {
        return $this->dow;
    }

    function setDow($dow): void
    {
        $this->dow = $dow;
    }

    function getDate()
    {
        return $this->date;
    }

    function setDate($date): void
    {
        $this->date = $date;
    }

    function getUsername()
    {
        return $this->username;
    }

    function setUsername($username): void
    {
        $this->username = $username;
    }


    public function __construct($db)
    {
        $this->conn = $db;
    }
    //Read SingleBooking
    public function readSingleBooking()
    {
        $query = "select Booking.student_ID, group_concat(Booking_Day.date, '  ') 
        as single_day, count(Booking_Day.date) as count, Class.class_name from Booking 
        join Booking_Day on Booking.ID = Booking_Day.booking_ID 
        join Student on Student.ID = Booking.student_ID
        join Class on Class.ID = Student.class_ID 
        group by Booking.student_ID";

        $result = $this->conn->query($query);

        return $result;
    }

    public function readMultipleBooking()
    {
        $query = "select Booking.student_ID,Booking_Extra.start_date, Booking_Extra.end_date,
        concat_ws(' , ',Booking_Extra.monday, Booking_Extra.tuesday, Booking_Extra.wednesday,Booking_Extra.thursday,
        Booking_Extra.friday) as days, Class.class_name from Booking 
        inner join Booking_Extra on Booking.ID = Booking_Extra.booking_ID 
        inner join Student on Student.ID = Booking.student_ID
        inner join Class on Class.ID = Student.class_ID 
        and date( end_date ) >= CURDATE()  
        group by  Booking.student_ID, Booking_Extra.start_date, Booking_Extra.end_date, days";

        $result = $this->conn->query($query);

        return $result;
    }

    //read bookings for tables
    //reads the total by the date picked (for restaurant)
    public function readTotalByDay($dow, $date)
    {
        $query = 'SELECT
                COUNT(*) as "title"
                FROM
                (
                    SELECT booking_ID
                    FROM Booking_Extra
                    where Booking_Extra.' . $dow . ' is not null and "' . $date . '" 
                    between start_date and end_date
                    UNION ALL
                    SELECT booking_ID
                    FROM Booking_Day
                    where date = "' . $date . '"
                ) as sum';

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    //read for the parents
    /*public function readAllByDay()
    {
        $query = "select Student.name, Student.last_name from Student
        inner join Booking on Booking.student_ID = Student.ID
        inner join Booking_Day on Booking_Day.booking_ID = Booking.ID
        inner join User_Parent on User_Parent.username = Student.parent_DNI
        where Booking_Day.date = ?
        and User_Parent.username = ?";

        $stmt = $this->conn->prepare($query);
        // bind data
        $stmt->bindParam(1, $this->date);
        $stmt->bindParam(2, $this->username);

        $stmt->execute();

        return $stmt;
    }*/

    //read for the parents
    public function readAllByExtra()
    {
        $query = "select name as title from Student
        inner join Booking on Booking.student_ID = Student.ID
        inner join Booking_Day on Booking_Day.booking_ID = Booking.ID
        inner join User_Parent on User_Parent.username = Student.parent_DNI
        where Booking_Day.date = ?
        and User_Parent.username = ?
        union
        select name as title from Student
        inner join Booking on Booking.student_ID = Student.ID
        inner join Booking_Extra on Booking_Extra.booking_ID = Booking.ID
        inner join User_Parent on User_Parent.username = Student.parent_DNI
        where ? between Booking_Extra.start_date and Booking_Extra.end_date
        and User_Parent.username = ?
        and Booking_Extra." . $this->dow . " is not null";

        $stmt = $this->conn->prepare($query);
        // bind data
        $stmt->bindParam(1, $this->date);
        $stmt->bindParam(2, $this->username);
        $stmt->bindParam(3, $this->date);
        $stmt->bindParam(4, $this->username);
        //$stmt->bindParam(5, $this->dow); not working.......

        $stmt->execute();
        //if(!$stmt->execute()) print_r($stmt->errorInfo());

        return $stmt;
    }

    //this part is for showing all the students data (school)
    public function readByDay()
    {
        $query = "select Student.ID, Student.name, Student.last_name, Class.class_name from Student
        inner join Booking on Booking.student_ID = Student.ID
        inner join Booking_Day on Booking_Day.booking_ID = Booking.ID
        inner join Class on Class.ID = Student.class_ID
        where Booking_Day.date = ?
        group by Student.ID
        union
        select Student.ID, Student.name, Student.last_name, Class.class_name from Student
        inner join Booking on Booking.student_ID = Student.ID
        inner join Booking_Extra on Booking_Extra.booking_ID = Booking.ID
        inner join Class on Class.ID = Student.class_ID
        where ? between Booking_Extra.start_date and Booking_Extra.end_date
        and Booking_Extra." . $this->dow . " is not null
        group by Student.ID";

        $stmt = $this->conn->prepare($query);
        // bind data
        $stmt->bindParam(1, $this->date);
        $stmt->bindParam(2, $this->date);
        //$stmt->bindParam(3, $this->dow);

        $stmt->execute();

        return $stmt;
    }

    //this read the allergies for the earlier function (for school)
    public function readAllergy()
    {
        $query = "select group_concat(Allergy.name) as allergy from Student
        inner join Student_Allergy on Student_Allergy.student_ID = Student.ID
        inner join Allergy on Allergy.ID = Student_Allergy.allergy_ID
        where Student.ID = ?";

        $stmt = $this->conn->prepare($query);
        // bind data
        $stmt->bindParam(1, $this->ID);

        $stmt->execute();

        return $stmt;
    }

    public function readTotalAllergy($dow, $date)
    {
        $query = 'select concat(Allergy.name, ": " ,count(Allergy.name)) as title from Student
        inner join Booking on Booking.student_ID = Student.ID
        inner join Booking_Day on Booking_Day.booking_ID = Booking.ID
        inner join Student_Allergy on Student_Allergy.student_ID = Student.ID
        inner join Allergy on Allergy.ID = Student_Allergy.allergy_ID
        and Booking_Day.date = "' . $date . '"
        group by Allergy.name
        union
        select concat(Allergy.name, ": " ,count(Allergy.name)) as title from Student
        inner join Booking on Booking.student_ID = Student.ID
        inner join Booking_Extra on Booking_Extra.booking_ID = Booking.ID
        inner join Student_Allergy on Student_Allergy.student_ID = Student.ID
        inner join Allergy on Allergy.ID = Student_Allergy.allergy_ID
        and "' . $date . '" between Booking_Extra.start_date and Booking_Extra.end_date
        and Booking_Extra.' . $dow . ' is not null
        group by Allergy.name';

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }
}
