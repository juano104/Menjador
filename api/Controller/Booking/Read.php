<?php

//Headers
include_once '../api/Model/Database.php';
include_once '../api/Model/Booking.php';

//DB
$db = new Database();
$db_conn = $db->connect();

//User
$booking = new Booking($db_conn);

$stmt = $booking->readSingleBooking();
$stmt2 = $booking->readMultipleBooking();
$count2 = $stmt2->rowCount();
$count = $stmt->rowCount();

if ($count > 0) {

    $userArr = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $e = array(
            "student_ID" => $student_ID,
            "single_day" => $single_day,
            "count" => $count,
            "class_name" => $class_name
        );

        array_push($userArr, $e);
    }
    //echo json_encode($userArr);
}
//$arr = array();

if ($count2 > 0) {

    $BookingsArr = array();

    while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $e = array(
            "student_ID" => $student_ID,
            "start_date" => $start_date,
            "end_date" => $end_date,
            "days" => $days,
            "class_name" => $class_name
        );
        array_push($BookingsArr, $e);
//        array_push($arr, $BookingsArr);
    }
}

//INCLUDE VIEW PHP
include "View/View-Booking.php";