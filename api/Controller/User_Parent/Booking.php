<?php

//Headers
include_once '../../Model/Database.php';
include_once '../../Model/User_Parent.php';

//DB
$db = new Database();
$db_conn = $db->connect();


$parent = new User_Parent($db_conn);

if ($_POST['date'] != "") {
    $parent->setParent_DNI($_POST['parent_DNI']);
    $redir = $parent->getParent_DNI();
    $parent->setStudent_ID($_POST['idstudent']);
    $parent->setStatus('active');
    $parent->setDate($_POST['date']);
    if ($parent->makeReservation()) {
        echo json_encode("Made reservation FOR ONE DAY");
        $parent->setBooking_ID($db_conn->lastInsertId());
        if ($parent->makeDayReservation()) {
            echo json_encode("Made DAY reservation");
        } else {
            echo json_encode("Error in day reservation");
        }
    } else {
        echo json_encode("Error");
    }
} else {
    $parent->setParent_DNI($_POST['parent_DNI']);
    $redir = $parent->getParent_DNI();
    $parent->setStudent_ID($_POST['idstudent']);
    $parent->setStatus('active');
    $parent->setStart_date($_POST['startdate']);
    $parent->setEnd_date($_POST['enddate']);

    if ($parent->makeReservation()) {
        echo json_encode("Made reservation FOR LOOSE");

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
        if ($parent->makeLooseReservation()) {
            echo json_encode("Made LOOSE reservation");
        } else {
            echo json_encode("Error in LOOSE reservation");
        }
    } else {
        echo json_encode("Error");
    }
}

//header("Location: http://localhost/PROJ_MENJADOR_PROVES/api/View/User_Parent/Home_Parent.php?username=" . $redir);
