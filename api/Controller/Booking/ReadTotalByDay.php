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

$today = date("Y-m-d");
$booking->setDate($_POST['day']);

$dayname = date('l', strtotime($booking->getDate()));;
$dayofweek = strtolower($dayname);

$booking->setDow($dayofweek);

$stmt = $booking->readTotalByDay();


$arr = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $e = array(
        "sum" => $sum
    );
    //$sumn = $row["sum"];
}

echo $dayofweek;
echo $sum . " bruh";

require_once "View/total.php";
