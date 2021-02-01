<?php

//Headers
include_once '../../../Model/Database.php';
include_once '../../../Model/User_Parent.php';

//DB
$db = new Database();
$db_conn = $db->connect();


$parent = new User_Parent($db_conn);
$properties = json_decode(file_get_contents("php://input"));

$parent->setStart_date($properties->date);
$parent->setEnd_date($properties->date);
$parent->setStudent_ID($properties->student_ID);


if ($parent->makeReservation()) {
    //json_encode("Made reservation");
    echo json_encode(array("statusCode" => 200));
    $parent->setBooking_ID($db_conn->lastInsertId());
    if ($parent->makeDayReservation()) {
        //json_encode("Made DAY reservation");
        echo json_encode(array("statusCode" => 200));
    } else {
        //json_encode("Error in day reservation");
        echo json_encode(array("statusCode" => 201));
    }
} else {
    echo json_encode("Error");
}
//header("Location: http://menjadorescola.me/Menjador/View/User_Parent/Home_Parent.php?username=56142879E");
