<?php

class Student
{
    //conn
    private $conn;
    //Properties
    private $name;
    private $last_name;
    private $allergy;
    private $birth_date;
    private $parent_id;
    private $class;

    function getClass()
    {
        return $this->class;
    }

    function getName()
    {
        return $this->name;
    }

    function getParent_Id()
    {
        return $this->parent_id;
    }

    function getLast_name()
    {
        return $this->last_name;
    }

    function getAllergy()
    {
        return $this->allergy;
    }

    function getBirth_Date()
    {
        return $this->birth_date;
    }

    function setClass($class): void
    {
        $this->class = $class;
    }

    function setName($name): void
    {
        $this->name = $name;
    }

    function setParent_Id($parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    function setLast_name($last_name): void
    {
        $this->last_name = $last_name;
    }

    function setAllergy($allergy): void
    {
        $this->allergy = $allergy;
    }

    function setBirth_Date($birth_date): void
    {
        $this->birth_date = $birth_date;
    }



    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function insertStudent()
    {
        $sqlQuery = "INSERT INTO
                Student (name, last_name, birth_date, parent_DNI,class_ID)
                values(?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sqlQuery);

        // bind data
        $stmt->bindParam(1, $this->name);
        $stmt->bindParam(2, $this->last_name);
        $stmt->bindParam(3, $this->birth_date);
        $stmt->bindParam(4, $this->parent_id);
        $stmt->bindParam(5, $this->class);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function insertAllergy($student_ID, $allergy_ID)
    {
        $sqlQuery = "INSERT INTO
                Student_Allergy (student_ID, allergy_ID)
                values(?, ?)";

        $stmt = $this->conn->prepare($sqlQuery);

        // bind data
        $stmt->bindParam(1, $student_ID);
        $stmt->bindParam(2, $allergy_ID);

        if(!$stmt->execute()) print_r($stmt->errorInfo());
    }
}
