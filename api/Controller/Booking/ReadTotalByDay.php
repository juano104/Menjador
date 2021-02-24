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


//if (isset($_POST['day'])) {
//$booking->setDate($_POST["day"]);
$today = date("Y-m-d");
$booking->setDate($today);

$dayname = date('l', strtotime($booking->getDate()));;
$dayofweek = strtolower($dayname);
$booking->setDow($dayofweek);

$stmt = $booking->readTotalByDay();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
//extract($row);

$booking->setSum($row["total"]);

echo $dayofweek;
echo "...";
echo $booking->getSum();

require_once "View/total.php";
//} else {
    /*$today = date("Y-m-d");
    $booking->setDate($today);

    $dayname = date('l', strtotime($booking->getDate()));;
    $dayofweek = strtolower($dayname);
    if ($dayofweek == "saturday" || $dayofweek == "sunday") {
        echo "No reservations on weekends";
    } else {
        $booking->setDow($dayofweek);

        $stmt = $booking->readTotalByDay();
        $arr = array();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);

        $booking->setSum($row["sum"]);

        echo $dayofweek;
        echo $booking->getSum() . "not post";
        require_once "View/total.php";
    }
}*/
