<?php

include_once "../api/Model/Plate.php";
include_once "../api/Model/Database.php";

//DB
$db = new Database();
$db_conn = $db->connect();


$plate = new Plate($db_conn);

$stmt = $plate->readMenuPlate();
$count = $stmt->rowCount();


if ($count > 0) {

    $userArr = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $e[] = array(
            "date" => $date,
            "title" => $title,
            "type" => $type,
        );
    }
    echo json_encode($e);
}
