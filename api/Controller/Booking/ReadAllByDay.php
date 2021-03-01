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

$year = date('Y');
if (date('n') < 6) {
    $ayear = $year - 1;
    $byear = $year;
} else {
    $ayear = $year;
    $byear = $year + 1;
}

$fecha1 = $ayear . '-09-01';
$fecha2 = $byear . '-06-21';

for ($i = $fecha1; $i <= $fecha2; $i = date("Y-m-d", strtotime($i . "+ 1 days"))) {
    $day = date('l', strtotime($i));
    $dayofweek = strtolower($day);

    $booking->setDow($dayofweek);
    $booking->setDate($day);
    $booking->setUsername("79481024P");


    $stmt = $booking->readAllByExtra();
    $arrextra = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $e = array(
            "date" => $i,
            "title" => "Tus Reservas: " . $title
        );
        //array_push($arrextra, $e);
    }



    /*$row = $stmt->fetch(PDO::FETCH_ASSOC);
    extract($row);
    //$booking->setSum($row["title"] ?? '');

    $e[] = array(
        "date" => $i,
        "title" => "Reservas: " . $title,
    );*/
}
echo json_encode($e);





/*session_start();
if (isset($_SESSION["name"])) {

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

        //include_once "View/reservas.php";
    } else {
        $today = date("Y-m-d");
        $booking->setDate($today);

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
    }
    include_once "View/reservas.php";
}
*/