<?php

class Login
{

    //conn
    private $conn;
    //Properties
    private $DNI;
    private $role;

    function getDNI()
    {
        return $this->DNI;
    }

    function getRole()
    {
        return $this->role;
    }

    function setDNI($DNI): void
    {
        $this->DNI = $DNI;
    }

    function setRole($role): void
    {
        $this->role = $role;
    }

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {
        $query = "Select DNI, role from User where DNI = '" . $this->DNI . "'";

        $result = $this->conn->query($query);

        $result->execute();
        return $result;
    }
    public function readPasswordParent($u)
    {
        $query = "select password from User_Parent where username = '" . $u . "'";

        $stmt = $this->conn->query($query);

        $stmt->execute();

        return $stmt;
    }
    public function readPasswordAdmin($u)
    {
        $query = "select password from User_Admin where username = '" . $u . "'";

        $stmt = $this->conn->query($query);

        $stmt->execute();

        return $stmt;
    }
    public function readPasswordRest($u)
    {
        $query = "select password from User_Restaurant where username = '" . $u . "'";

        $stmt = $this->conn->query($query);

        $stmt->execute();

        return $stmt;
    }
}
