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
    private $birth_date;
    private $allergy;
    private $parent_DNI;

    function getParent_DNI(){
        return $this->parent_DNI;
    }
    

    function getBirth_date(){
        return $this->birth_date;
    }

    function getAllergy(){
        return $this->allergy;
    }

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

    function setParent_DNI($parent_DNI): void
    {
        $this->parent_DNI = $parent_DNI;
    }

    function setLast_name($last_name): void
    {
        $this->last_name = $last_name;
    }

    function setDNI($DNI): void
    {
        $this->DNI = $DNI;
    }
    
    function setBirthDate($birth_date): void
    {
        $this->birth_date = $birth_date;
    }
    
    function setAllergy($allergy): void
    {
        $this->allergy = $allergy;
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
                User (name, last_name, DNI, role)
                values(?, ?, ?, 'parent')";

        $stmt = $this->conn->prepare($sqlQuery);

        // bind data
        $stmt->bindParam(1, $this->name);
        $stmt->bindParam(2, $this->last_name);
        $stmt->bindParam(3, $this->DNI);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function insertParent()
    {
        $sqlQuery = "INSERT INTO
                User_Parent
                values(?, ?)";

        $stmt = $this->conn->prepare($sqlQuery);

        // bind data
        $stmt->bindParam(1, $this->username);
        $stmt->bindParam(2, $this->password);


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
