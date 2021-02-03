<?php

//Headers
include_once '../../Model/Database.php';
include_once '../../Model/User_Parent.php';

//DB
$db = new Database();
$db_conn = $db->connect();


$parent = new User_Parent($db_conn);
//$redir = $parent->setUsername(isset($_GET["username"]) ? $_GET["username"] : die());
//$properties = json_decode(file_get_contents("../../../View/User_Parent/Home_Parent.php"));

/*$parent->setStart_date($properties->date);
$parent->setEnd_date($properties->date);
$parent->setStudent_ID($properties->student_ID);*/
//
$parent->setStart_date($_POST['date']);
$parent->setEnd_date($_POST['date']);
$parent->setStudent_ID($_POST['radioname']);


if ($parent->makeReservation()) {
    echo json_encode("Made reservation");
    echo json_encode(array("statusCode" => 200));
    $parent->setBooking_ID($db_conn->lastInsertId());
    if ($parent->makeDayReservation()) {
        echo json_encode("Made DAY reservation");
        echo json_encode(array("statusCode" => 200));
    } else {
        echo json_encode("Error in day reservation");
        echo json_encode(array("statusCode" => 201));
    }
} else {
    echo json_encode("Error");
}
//header("Location: http://menjadorescola.me/Menjador/View/User_Parent/Home_Parent.php?username=" . $redir);
