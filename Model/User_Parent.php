<?php

Class User_Parent {

    //connection db
    private $conn;
    //properties for booking TABLE ind db
    //private $ID;
    private $start_date;
    private $end_date;
    private $student_ID;
    private $booking_ID;
    //these properties for reading student
    private $username;
    private $ID;
    private $name;
    private $last_name;
    
    function getID() {
        return $this->ID;
    }

    function setID($ID): void {
        $this->ID = $ID;
    }

        function getUsername() {
        return $this->username;
    }

    function getName() {
        return $this->name;
    }

    function getLast_name() {
        return $this->last_name;
    }

    function setUsername($username): void {
        $this->username = $username;
    }

    function setName($name): void {
        $this->name = $name;
    }

    function setLast_name($last_name): void {
        $this->last_name = $last_name;
    }

    function getBooking_ID() {
        return $this->booking_ID;
    }

    function setBooking_ID($booking_ID): void {
        $this->booking_ID = $booking_ID;
    }

    /* function getID() {
      return $this->ID;
      } */

    function getStart_date() {
        return $this->start_date;
    }

    function getEnd_date() {
        return $this->end_date;
    }

    function getStudent_ID() {
        return $this->student_ID;
    }

    /* function setID($ID): void {
      $this->ID = $ID;
      } */

    function setStart_date($start_date): void {
        $this->start_date = $start_date;
    }

    function setEnd_date($end_date): void {
        $this->end_date = $end_date;
    }

    function setStudent_ID($student_ID): void {
        $this->student_ID = $student_ID;
    }

    public function __construct($db) {
        $this->conn = $db;
    }

    //Read

    public function read() {
        $query = "select ID, name, last_name from Student 
        inner join User_Parent on 
        Student.parent_DNI = User_Parent.username
        where User_Parent.username = ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->username);

        $stmt->execute();

        return $stmt;
    }

    /*public function readOne() {
        $query = "select ID, name, last_name from Student 
        inner join User_Parent on 
        Student.parent_DNI = User_Parent.username
        where User_Parent.username = ? and Student.name = ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->username);
        $stmt->bindParam(2, $this->name);

        $stmt->execute();

        return $stmt;
    }*/
    //RESERVATIONS
    public function makeReservation() {
        $query = "insert into Booking(start_date, end_date, student_ID) values(?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->start_date);
        $stmt->bindParam(2, $this->end_date);
        $stmt->bindParam(3, $this->student_ID);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function makeDayReservation() {
        $query = "insert into Booking_Day(booking_ID) values(?)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->booking_ID);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

}
