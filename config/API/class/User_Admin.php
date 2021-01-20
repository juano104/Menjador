<?php

class User_Admin
{

    //conn
    private $conn;
    //Properties
    private $DNI;
    private $username;
    private $password;

    function getDNI()
    {
        return $this->DNI;
    }

    function getUsername()
    {
        return $this->username;
    }

    function getPassword()
    {
        return $this->password;
    }

    function setDNI($DNI): void
    {
        $this->DNI = $DNI;
    }

    function setUsername($username): void
    {
        $this->username = $username;
    }

    function setPassword($password): void
    {
        $this->password = $password;
    }

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //Read
    public function read()
    {
        $query = "Select * from User_Admin";

        $result = $this->conn->query($query);

        return $result;
    }

    public function readOne()
    {
        $sqlQuery = "SELECT
                        DNI, 
                        username, 
                        password
                    FROM User_Admin
                    WHERE 
                        DNI = ?
                    LIMIT 0,1";

        $stmt = $this->conn->prepare($sqlQuery);

        $stmt->bindParam(1, $this->DNI);

        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->username = $dataRow['username'];
        $this->password = $dataRow['password'];
    }

    /*public function create() {
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
    }*/
}
