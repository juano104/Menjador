<?php

//Headers
include_once '../api/Model/Database.php';
include_once '../api/Model/Booking.php';

//DB
$db = new Database();
$db_conn = $db->connect();

//User
$booking = new Booking($db_conn);

$booking->setDate($_POST["day"]);

$dayname = date('l', strtotime($booking->getDate()));;
$dayofweek = strtolower($dayname);

$booking->setDow($dayofweek);

$stmt = $booking->readByDay();


$arrday = array();
$arrextra = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $e = array(
        "ID" => $ID,
        "name" => $name,
        "last_name" => $last_name
    );

    $booking->setID($ID);
    $stmt2 = $booking->readAllergy();
    while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $a = array(
            "allergy" => $allergy
        );
        if ($allergy != null) {
            array_push($e, $a);
        }
    }

    array_push($arrday, $e);
}

echo json_encode($arrday);
