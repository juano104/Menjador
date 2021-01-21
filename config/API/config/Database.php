<?php
class Database{

    private $host = "40.68.231.216";
    private $username = "menjador";
    private $password = "password";
    private $db = "AppMenjador";
    public $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db);;
        } catch (PDOException $exception) {
            echo "Database could not be connected: " . $exception->getMessage();
        }
        return $this->conn;
    }
    
}