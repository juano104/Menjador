<?php
//session_start();

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

    $stmt = $booking->readTotalByDay();
    $arr = array();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $booking->setSum($row["total"]);

    echo $dayofweek;
    echo $booking->getSum() . "not post";
    require_once "View/total.php";
} else {
    $today = date("Y-m-d");
    //$date = "2021-03-01";
    $booking->setDate($today);

    $dayname = date('l', strtotime($booking->getDate()));;
    $dayofweek = strtolower($dayname);
    $booking->setDow($dayofweek);

    $stmt = $booking->readTotalByDay();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $booking->setSum($row["total"]);

    echo $dayofweek;
    echo "...";
    echo $booking->getSum();

    require_once "View/total.php";
}
