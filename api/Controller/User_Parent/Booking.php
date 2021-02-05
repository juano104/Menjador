<?php

//Headers
include_once '../../Model/Database.php';
include_once '../../Model/User_Parent.php';

//DB
$db = new Database();
$db_conn = $db->connect();


$parent = new User_Parent($db_conn);

//$properties = json_decode(file_get_contents("../../../View/User_Parent/Home_Parent.php"));

/*$parent->setStart_date($properties->date);
$parent->setEnd_date($properties->date);
$parent->setStudent_ID($properties->student_ID);*/
//

if ($_POST['date'] != '') {
    $parent->setParent_DNI($_POST['parent_DNI']);
    $redir = $parent->getParent_DNI();
    $parent->setStudent_ID($_POST['radioname']);
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
} else /*if (isset($_POST['startdate']) && isset($_POST['enddate'])) */ {
    $parent->setParent_DNI($_POST['parent_DNI']);
    $redir = $parent->getParent_DNI();
    $parent->setStudent_ID($_POST['radioname']);
    $parent->setStatus('active');
    $parent->setStart_date($_POST['startdate']);
    $parent->setEnd_date($_POST['enddate']);

    if ($parent->makeReservation()) {
        echo json_encode("Made reservation FOR LOOSE");

        $parent->setBooking_ID($db_conn->lastInsertId());
        if (isset($_POST['monday'])) {
            $parent->setMonday($_POST['monday']);
        }
        if (isset($_POST['tuesday'])) {
            $parent->setTuesday($_POST['tuesday']);
        }
        if (isset($_POST['wednesday'])) {
            $parent->setWednesday($_POST['wednesday']);
        }
        if (isset($_POST['thursday'])) {
            $parent->setThursday($_POST['thursday']);
        }
        if (isset($_POST['friday'])) {
            $parent->setFriday($_POST['friday']);
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
