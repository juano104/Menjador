<?php
session_start();


if (isset($_POST['day'])) {

    $booking->setDate($_POST["day"]);

    $dayname = date('l', strtotime($booking->getDate()));;
    $dayofweek = strtolower($dayname);

    $booking->setDow($dayofweek);

    $stmt = $booking->readTotalByDay();


    $arr = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        /*$e = array(
            "sum" => $sumd
        );*/
        $sumd = $row["sum"];

        //array_push($arr, $e);
    }
    //echo json_encode($arr);
    echo $dayofweek;
    echo $sumd;
} else {
    //Headers
    include_once '../api/Model/Database.php';
    include_once '../api/Model/Booking.php';

    //DB
    $db = new Database();
    $db_conn = $db->connect();

    //User
    $booking = new Booking($db_conn);
    $today = date("Y-m-d");
    $booking->setDate($today);

    $dayname = date('l', strtotime($booking->getDate()));;
    $dayofweek = strtolower($dayname);

    $booking->setDow($dayofweek);

    $stmt = $booking->readTotalByDay();


    $arr = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        /*$e = array(
            "sum" => $sumn
        );*/
        $sumn = $row["sum"];

        //array_push($arr, $e);
    }
    //echo json_encode($arr);
    echo $dayofweek;
    echo $sumn;
}
require_once "View/total.php";
