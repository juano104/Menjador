<?php

//Headers
include_once '../../../Model/Database.php';
include_once '../../../Model/Booking.php';

//DB
$db = new Database();
$db_conn = $db->connect();

//User
$booking = new Booking($db_conn);

$stmt = $booking->readSingleBooking();
$count = $stmt->rowCount();

if ($count > 0) {

    $userArr = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $e = array(
            "student_ID" => $student_ID,
            "single_day" => $single_day,
        );

        array_push($userArr, $e);
    }
    //echo json_encode($userArr);
}

//INCLUDE VIEW PHP
include "../../../View/User_Admin/View-Booking.php";