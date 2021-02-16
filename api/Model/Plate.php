<?php
class Plate{
    //conn
    private $conn;
    private $ID;
    private $name;
    private $type;

    function getName()
    {
        return $this->name;
    }

    function getType()
    {
        return $this->type;
    }

    function getID()
    {
        return $this->ID;
    }

    function setName($name): void
    {
        $this->name = $name;
    }

    function setType($type): void
    {
        $this->type = $type;
    }

    function SetID($ID): void
    {
        $this->ID = $ID;
    }

    public function __construct($db)
    {
        $this->conn = $db;
    }
    //Read SingleBooking
    public function readPlate()
    {
        $query = "select * from Plate";

        $result = $this->conn->query($query);

        return $result;
    }

    public function readMenuPlate()
    {
        $query = "select menu_ID,date, group_concat(distinct Plate.name order by Plate.type) as title from Plate, menu, menu_day where menu_day.menu_ID = menu.ID and menu_day.plate_ID = Plate.ID group by menu_ID";

        $result = $this->conn->query($query);

        return $result;
    }

    public function ifExistsPlate($nom)
    {
        $sqlQuery = "SELECT EXISTS (select * from Plate where name = ?)";

        $stmt = $this->conn->prepare($sqlQuery);

        // bind data
        $stmt->bindParam(1, $nom);

        if(!$stmt->execute()) print_r($stmt->errorInfo());

        $result = $stmt->fetchAll();
        
        $toString = implode(",", $result[0]);
        $cercar = "1";
        $pos = strpos($toString,$cercar);
        if($pos === false){
            echo "No ha sigut trobat";
            return true;
        }else{
            return false;
        }

    }


    public function insertPlate()
    {
        $sqlQuery = "INSERT INTO
                Plate (name, type)
                values(?, ?)";

        $stmt = $this->conn->prepare($sqlQuery);

        // bind data
        $stmt->bindParam(1, $this->name);
        $stmt->bindParam(2, $this->type);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    
}

?>