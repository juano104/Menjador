<?php
session_start();
//Headers
include_once '../api/Model/Database.php';
include_once '../api/Model/Booking.php';

//DB
$db = new Database();
$db_conn = $db->connect();

//User
$booking = new Booking($db_conn);

if (isset($_POST['day'])) {
    $booking->setDate($_POST["day"]);

    $dayname = date('l', strtotime($booking->getDate()));;
    $dayofweek = strtolower($dayname);

    $booking->setDow($dayofweek);

    $stmt = $booking->readByDay();


    $arrday = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $booking->setID($ID);
        $stmt2 = $booking->readAllergy();
        while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            if ($allergy != null) {
                $a = array(
                    "ID" => $ID,
                    "name" => $name,
                    "last_name" => $last_name,
                    "allergy" => $allergy,
                    "class_name" => $class_name
                );
                array_push($arrday, $a);
            } else {
                $a = array(
                    "ID" => $ID,
                    "name" => $name,
                    "last_name" => $last_name,
                    "allergy" => "none",
                    "class_name" => $class_name
                );
                array_push($arrday, $a);
            }
        }
    }

    //echo json_encode($arrday);
} else {
    $today = date("Y-m-d");
    $booking->setDate($today);

    $dayname = date('l', strtotime($booking->getDate()));;
    $dayofweek = strtolower($dayname);

    $booking->setDow($dayofweek);

    $stmt = $booking->readByDay();
    

    $arrday = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $booking->setID($ID);
        $stmt2 = $booking->readAllergy();
        while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            if ($allergy != null) {
                $a = array(
                    "ID" => $ID,
                    "name" => $name,
                    "last_name" => $last_name,
                    "allergy" => $allergy,
                    "class_name" => $class_name
                );
                array_push($arrday, $a);
            } else {
                $a = array(
                    "ID" => $ID,
                    "name" => $name,
                    "last_name" => $last_name,
                    "allergy" => "none",
                    "class_name" => $class_name
                );
                array_push($arrday, $a);
            }
        }
    }

    //echo json_encode($arrday);
}



include_once "View/View-Reservas.php";
