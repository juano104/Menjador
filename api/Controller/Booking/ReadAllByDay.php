<?php
session_start();
if (isset($_SESSION["name"])) {
    $today = date("Y-m-d");
    $_POST['day'] = $today;
    //Headers
    include_once '../api/Model/Database.php';
    include_once '../api/Model/Booking.php';

    //DB
    $db = new Database();
    $db_conn = $db->connect();

    //User
    $booking = new Booking($db_conn);

    $booking->setDate($_POST["day"]);

    $dayname = date('l', strtotime($booking->getDate()));;
    $dayofweek = strtolower($dayname);

    $booking->setDow($dayofweek);
    $booking->setUsername($_SESSION["username"]);

    $stmt2 = $booking->readAllByExtra();

    $arrextra = array();


    while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $e = array(
            "name" => $name,
            "last_name" => $last_name
        );

        array_push($arrextra, $e);
    }

    /*echo json_encode($arrextra);
echo json_encode($dayofweek);*/

    include_once "View/reservas.php";
}
