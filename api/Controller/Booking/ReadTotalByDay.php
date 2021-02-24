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
$fecha1 = date('Y').'-01-01';
$fecha2 = date('Y').'-06-21';

for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){
    $day = date('l', strtotime($i));
    $dayofweek = strtolower($day);
    
    $stmt = $booking->readTotalByDay($dayofweek, $i);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $booking->setSum($row["title"] ?? '');
  
    $e[] = array(
        "date" => $i,
        "title" => $booking->getSum(),
    ); 

}
echo json_encode($e);
