<?php

class User_Admin
{

    //conn
    private $conn;
    //Properties
    private $name;
    private $last_name;
    private $DNI;
    private $role;
    private $username;
    private $password;

    function getName()
    {
        return $this->name;
    }

    function getLast_name()
    {
        return $this->last_name;
    }

    function getDNI()
    {
        return $this->DNI;
    }

    function getRole()
    {
        return $this->role;
    }

    function getUsername()
    {
        return $this->DNI;
    }
    function getPassword()
    {
        return $this->password;
    }

    function setName($name): void
    {
        $this->name = $name;
    }

    function setLast_name($last_name): void
    {
        $this->last_name = $last_name;
    }

    function setDNI($DNI): void
    {
        $this->DNI = $DNI;
    }

    function setRole($role): void
    {
        $this->role = $role;
    }

    function setUsername($DNI): void
    {
        $this->username = $DNI;
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
        $query = "Select * from User";

        $result = $this->conn->query($query);

        return $result;
    }

    public function readOne()
    {
        $sqlQuery = "SELECT *
                    FROM User
                    WHERE 
                        DNI = ? limit 1";

        $stmt = $this->conn->prepare($sqlQuery);

        $stmt->bindParam(1, $this->DNI);

        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $dataRow['name'];
        $this->last_name = $dataRow['last_name'];
        $this->DNI = $dataRow['DNI'];
        $this->role = $dataRow['role'];
    }

    public function insertUser()
    {
        $sqlQuery = "INSERT INTO
                User
                values(?, ?, ?, ?)
                /*name = :name,
                last_name = :last_name,
                DNI = :DNI,
                role = :role*/";

        $stmt = $this->conn->prepare($sqlQuery);

        /*// sanitize
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->last_name = htmlspecialchars(strip_tags($this->last_name));
        $this->DNI = htmlspecialchars(strip_tags($this->DNI));
        $this->role = htmlspecialchars(strip_tags($this->role));*/

        // bind data
        $stmt->bindParam("ssss", $this->name, $this->last_name, $this->DNI, $this->role);
        /*$stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":last_name", $this->last_name);
        $stmt->bindParam(":DNI", $this->DNI);
        $stmt->bindParam(":role", $this->role);*/

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function insertParent()
    {
        $sqlQuery = "INSERT INTO
                User_Parent
                values(?, ?)
                /*username = :username,
                password = :password*/";

        $stmt = $this->conn->prepare($sqlQuery);

        /*// sanitize
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));*/

        // bind data
        $stmt->bindParam("ss", $this->username, $this->password);
        /*$stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);*/

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    /*public function update() {
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

      /*function delete() {
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
