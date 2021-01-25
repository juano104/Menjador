<?php

class Person {

    //conn
    private $conn;
    //Properties
    private $name;
    private $last_name;
    private $DNI;
    private $birth_date;
    private $role;
    
    function getName() {
        return $this->name;
    }

    function getLast_name() {
        return $this->last_name;
    }

    function getDNI() {
        return $this->DNI;
    }

    function getBirth_date() {
        return $this->birth_date;
    }

    function getRole() {
        return $this->role;
    }

    function setName($name): void {
        $this->name = $name;
    }

    function setLast_name($last_name): void {
        $this->last_name = $last_name;
    }

    function setDNI($DNI): void {
        $this->DNI = $DNI;
    }

    function setBirth_date($birth_date): void {
        $this->birth_date = $birth_date;
    }

    function setRole($role): void {
        $this->Role = $role;
    }

        public function __construct($db) {
        $this->conn = $db;
    }

    //Read
    public function read() {
        $query = "Select * from Person";

        $result = $this->conn->query($query);

        return $result;
    }

    public function readOne() {
        $sqlQuery = "SELECT *
                    FROM Person
                    WHERE 
                        DNI = ? limit 1";

        $stmt = $this->conn->prepare($sqlQuery);

        $stmt->bindParam(1, $this->DNI);

        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $dataRow['name'];
        $this->last_name = $dataRow['last_name'];
        $this->DNI = $dataRow['DNI'];
        $this->birth_date = $dataRow['birth_date'];
        $this->role = $dataRow['role'];
    }

    /* public function create() {
      $sqlQuery = "INSERT INTO
      users
      SET
      username = :username,
      privileges = :privileges";

      $stmt = $this->conn->prepare($sqlQuery);

      // sanitize
      $this->username = htmlspecialchars(strip_tags($this->username));
      $this->privileges = htmlspecialchars(strip_tags($this->privileges));

      // bind data
      $stmt->bindParam(":username", $this->username);
      $stmt->bindParam(":privileges", $this->privileges);

      if ($stmt->execute()) {
      return true;
      }
      return false;
      }

      public function update() {
      $sqlQuery = "UPDATE users
      SET
      username = :username,
      privileges = :privileges
      WHERE
      id = :id";

      $stmt = $this->conn->prepare($sqlQuery);

      $this->username = htmlspecialchars(strip_tags($this->username));
      $this->privileges = htmlspecialchars(strip_tags($this->privileges));
      $this->id = htmlspecialchars(strip_tags($this->id));

      // bind data
      $stmt->bindParam(":username", $this->username);
      $stmt->bindParam(":privileges", $this->privileges);
      $stmt->bindParam(":id", $this->id);

      if ($stmt->execute()) {
      return true;
      }
      return false;
      }

      function delete() {
      $sqlQuery = "DELETE FROM users WHERE id = ?";
      $stmt = $this->conn->prepare($sqlQuery);

      $this->id = htmlspecialchars(strip_tags($this->id));

      $stmt->bindParam(1, $this->id);

      if ($stmt->execute()) {
      return true;
      }
      return false;
      } */
}