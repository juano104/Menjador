<?php

class Login {

    //conn
    private $conn;
    //Properties
    private $DNI;
    private $role;

    function getDNI() {
        return $this->DNI;
    }

    function getRole() {
        return $this->role;
    }

    function setDNI($DNI): void {
        $this->DNI = $DNI;
    }

    function setRole($role): void {
        $this->role = $role;
    }

    public function read() {
        $query = "Select DNI, role from User where DNI = '" . $this->DNI . "'" ;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

}
