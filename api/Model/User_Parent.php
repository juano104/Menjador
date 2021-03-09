<?php

class User_Parent
{

    //connection db
    private $conn;
    //these properties for reading student
    private $username;
    private $ID;
    private $name;
    private $last_name;
    private $password;
    //properties for Booking TABLE in db
    private $student_ID;
    private $parent_DNI;
    private $status;
    private $date_made;
    //booking id for both tables
    private $booking_ID;
    //properties for only one day
    private $date;
    //properties for loose days (monthly/yearly)
    private $start_date;
    private $end_date;
    private $monday;
    private $tuesday;
    private $wednesday;
    private $thursday;
    private $friday;

    //getter setter for reading student
    function getUsername()
    {
        return $this->username;
    }
    function getPassword()
    {
        return $this->password;
    }

    function getID()
    {
        return $this->ID;
    }

    function getName()
    {
        return $this->name;
    }
    function getDate_made()
    {
        return $this->date_made;
    }

    function getLast_name()
    {
        return $this->last_name;
    }

    function setUsername($username): void
    {
        $this->username = $username;
    }

    function setID($ID): void
    {
        $this->ID = $ID;
    }

    function setName($name): void
    {
        $this->name = $name;
    }

    function setPassword($password): void
    {
        $this->password = $password;
    }

    function setLast_name($last_name): void
    {
        $this->last_name = $last_name;
    }

    //getter setters for booking
    function getStudent_ID()
    {
        return $this->student_ID;
    }

    function getParent_DNI()
    {
        return $this->parent_DNI;
    }

    function getStatus()
    {
        return $this->status;
    }

    function getBooking_ID()
    {
        return $this->booking_ID;
    }

    function getDate()
    {
        return $this->date;
    }

    function getStart_date()
    {
        return $this->start_date;
    }

    function getEnd_date()
    {
        return $this->end_date;
    }

    function getMonday()
    {
        return $this->monday;
    }

    function getTuesday()
    {
        return $this->tuesday;
    }

    function getWednesday()
    {
        return $this->wednesday;
    }

    function getThursday()
    {
        return $this->thursday;
    }

    function getFriday()
    {
        return $this->friday;
    }

    function setStudent_ID($student_ID): void
    {
        $this->student_ID = $student_ID;
    }

    function setParent_DNI($parent_DNI): void
    {
        $this->parent_DNI = $parent_DNI;
    }

    function setStatus($status): void
    {
        $this->status = $status;
    }

    function setBooking_ID($booking_ID): void
    {
        $this->booking_ID = $booking_ID;
    }

    function setDate($date): void
    {
        $this->date = $date;
    }
    function setDate_made($date_made): void
    {
        $this->date_made = $date_made;
    }

    function setStart_date($start_date): void
    {
        $this->start_date = $start_date;
    }

    function setEnd_date($end_date): void
    {
        $this->end_date = $end_date;
    }

    function setMonday($monday): void
    {
        $this->monday = $monday;
    }

    function setTuesday($tuesday): void
    {
        $this->tuesday = $tuesday;
    }

    function setWednesday($wednesday): void
    {
        $this->wednesday = $wednesday;
    }

    function setThursday($thursday): void
    {
        $this->thursday = $thursday;
    }

    function setFriday($friday): void
    {
        $this->friday = $friday;
    }

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //Read

    public function read()
    {
        $query = "select ID, name, last_name, password from Student 
        inner join User_Parent on 
        Student.parent_DNI = User_Parent.username
        where User_Parent.username = ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->username);

        $stmt->execute();

        return $stmt;
    }

    public function readPassword(){
        $query = "select password from User_Parent where username = ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->username);

        $stmt->execute();

        return $stmt;
    }

    /*public function readOne($studentname)
    {
        $query = "select ID, name, last_name from Student 
        inner join User_Parent on 
        Student.parent_DNI = User_Parent.username
        where User_Parent.username = ? and Student.name = " . $studentname;

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->username);
        //$stmt->bindParam(2, $this->name);

        $stmt->execute();

        return $stmt;
    }*/

    //RESERVATIONS
    public function makeReservation()
    {
        $query = "insert into Booking(student_ID, parent_DNI, status, date_made) values(?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->student_ID);
        $stmt->bindParam(2, $this->parent_DNI);
        $stmt->bindParam(3, $this->status);
        $stmt->bindParam(4, $this->date_made);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    //ONE day
    public function makeDayReservation()
    {
        $query = "insert into Booking_Day values(?, ?)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->booking_ID);
        $stmt->bindParam(2, $this->date);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    //LOOSE days
    public function makeExtraReservation()
    {
        $query = "insert into Booking_Extra values(?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->booking_ID);
        $stmt->bindParam(2, $this->start_date);
        $stmt->bindParam(3, $this->end_date);
        $stmt->bindParam(4, $this->monday);
        $stmt->bindParam(5, $this->tuesday);
        $stmt->bindParam(6, $this->wednesday);
        $stmt->bindParam(7, $this->thursday);
        $stmt->bindParam(8, $this->friday);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
