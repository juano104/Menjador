<?php

if(empty($_SESSION["username"])){
    header("Location: https://www.menjadorescola.me/");
}
//print_r($_SESSION["username"]);



//Headers
include_once '../api/Model/Database.php';
include_once '../api/Model/User_Parent.php';

//DB
$db = new Database();
$db_conn = $db->connect();

$hoy = date("Y-m-d");


$parent = new User_Parent($db_conn);
$parent->setDate_made($hoy);

if ($_POST['date1'] != "") {
    $parent->setParent_DNI($_POST['parent_DNI']);
    $redir = $parent->getParent_DNI();
    $parent->setStudent_ID($_POST['idstudent']);
    $parent->setStatus('active');
    //$parent->setDate_made($hoy);
    $parent->setDate($_POST['date1']);
    if ($parent->makeReservation()) {
        //echo json_encode("Made reservation FOR ONE DAY, " . $hoy);
        echo json_encode("Se realizó correctamente la reserva de tipo sueltos");
        $parent->setBooking_ID($db_conn->lastInsertId());
        if ($parent->makeDayReservation()) {
            echo json_encode("Reserva para el dia: " . $parent->getDate());
        } else {
            echo json_encode("Error en reserva sueltas");
        }
    } else {
        echo json_encode("Error");
    }
} else {
    $parent->setParent_DNI($_POST['parent_DNI']);
    $redir = $parent->getParent_DNI();
    $parent->setStudent_ID($_POST['idstudent']);
    $parent->setStatus('active');
    //$parent->setDate_made($hoy);
    $parent->setStart_date($_POST['startdate']);
    $parent->setEnd_date($_POST['enddate']);

    if ($parent->makeReservation()) {
        echo json_encode("Made reservation FOR EXTRA, " . $hoy);

        $parent->setBooking_ID($db_conn->lastInsertId());
        if ($_POST['monday'] == "1") {
            $parent->setMonday("Monday");
        }
        if ($_POST['tuesday'] == "1") {
            $parent->setTuesday("Tuesday");
        }
        if ($_POST['wednesday'] == "1") {
            $parent->setWednesday("Wednesday");
        }
        if ($_POST['thursday'] == "1") {
            $parent->setThursday("Thursday");
        }
        if ($_POST['friday'] == "1") {
            $parent->setFriday("Friday");
        }
        if ($parent->makeExtraReservation()) {
            echo json_encode("Made EXTRA reservation");
        } else {
            echo json_encode("Error in EXTRA reservation");
        }
    } else {
        echo json_encode("Error");
    }
}

if ($_POST['date2'] != "") {
    $parent->setDate($_POST['date2']);
    if ($parent->makeReservation()) {
        echo json_encode("Made reservation FOR SECOND DAY, " . $hoy);
        $parent->setBooking_ID($db_conn->lastInsertId());
        if ($parent->makeDayReservation()) {
            echo json_encode("Made DAY reservation SECOND");
        } else {
            echo json_encode("Error in second day reservation");
        }
    } else {
        echo json_encode("Error");
    }
}
if ($_POST['date3'] != "") {
    $parent->setDate($_POST['date3']);
    if ($parent->makeReservation()) {
        echo json_encode("Made reservation FOR THIRD DAY, " . $hoy);
        $parent->setBooking_ID($db_conn->lastInsertId());
        if ($parent->makeDayReservation()) {
            echo json_encode("Made DAY reservation THIRD");
        } else {
            echo json_encode("Error in third day reservation");
        }
    } else {
        echo json_encode("Error");
    }
}
if ($_POST['date4'] != "") {
    $parent->setDate($_POST['date4']);
    if ($parent->makeReservation()) {
        echo json_encode("Made reservation FOR FOURTH DAY, " . $hoy);
        $parent->setBooking_ID($db_conn->lastInsertId());
        if ($parent->makeDayReservation()) {
            echo json_encode("Made DAY reservation FOURTH");
        } else {
            echo json_encode("Error in fourth day reservation");
        }
    } else {
        echo json_encode("Error");
    }
}
if ($_POST['date5'] != "") {
    $parent->setDate($_POST['date5']);
    if ($parent->makeReservation()) {
        echo json_encode("Made reservation FOR FIFTH DAY, " . $hoy);
        $parent->setBooking_ID($db_conn->lastInsertId());
        if ($parent->makeDayReservation()) {
            echo json_encode("Made DAY reservation FIFTH");
        } else {
            echo json_encode("Error in fifth day reservation");
        }
    } else {
        echo json_encode("Error");
    }
}

//header("Location: https://www.menjadorescola.me/login");