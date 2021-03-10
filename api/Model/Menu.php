<?php
class Menu
{
    //conn
    private $conn;

    private $IDMenu;
    private $IDPlate;
    private $date;

    function getIDMenu()
    {
        return $this->IDMenu;
    }

    function getIDPlate()
    {
        return $this->IDPlate;
    }

    function getDate()
    {
        return $this->date;
    }

    function SetDate($date): void
    {
        $this->date = $date;
    }


    function SetIDMenu($IDMenu): void
    {
        $this->IDMenu = $IDMenu;
    }
    function SetIDPlate($IDPlate): void
    {
        $this->IDPlate = $IDPlate;
    }

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function insertMenu()
    {
        $sqlQuery = "INSERT INTO
                Menu (date)
                values(?)";

        $stmt = $this->conn->prepare($sqlQuery);

        // bind data
        $stmt->bindParam(1, $this->date);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function insertMenuPlate($IDMenu, $IDPlate)
    {
        $sqlQuery = "INSERT INTO
                Menu_Day(menu_ID, plate_ID)
                values(? , ?)";

        $stmt = $this->conn->prepare($sqlQuery);

        // bind data
        $stmt->bindParam(1, $IDMenu);
        $stmt->bindParam(2, $IDPlate);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function readPrice()
    {
        $query = "select * from Menu_Price";

        $result = $this->conn->query($query);

        $result->execute();
        return $result;
    }

    public function updatePrice($oldprice, $newprice)
    {
        $query = "update Menu_Price set price = ? where price = ?";

        $stmt = $this->conn->prepare($query);

        // bind data
        $stmt->bindParam(1, $newprice);
        $stmt->bindParam(2, $oldprice);

        $stmt->execute();
    }
}
