<?php

//Headers
include_once "../api/Model/Plate.php";
include_once "../api/Model/Database.php";

//DB
$db = new Database();
$db_conn = $db->connect();

//User
$plate = new Plate($db_conn);

$stmt = $plate->readPlate();
$count = $stmt->rowCount();


$stmt2 = $plate->readPlate();
$count2 = $stmt2->rowCount();

$stmt3 = $plate->readPlate();
$count3 = $stmt3->rowCount();

/*
if ($count > 0) {

    $PlateArr = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $e = array(
            "name" => $name,
            "type" => $type,
        );

        array_push($PlateArr, $e);
    }
}

if ($count2 > 0) {

    $DessertArr = array();

    while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $e = array(
            "name" => $name,
            "type" => $type,
        );
        array_push($DessertArr, $e);
    }

}*/


//INCLUDE VIEW PHP
include "View/View-Plate.php";