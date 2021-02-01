<?php

//Headers
include_once '../../../Model/Database.php';
include_once '../../../Model/User_Parent.php';

//DB
$db = new Database();
$db_conn = $db->connect();


$parent = new User_Parent($db_conn);
$properties = json_decode(file_get_contents("php://input"));

$parent->setStart_date($properties->date);
$parent->setEnd_date($properties->date);
$parent->setStudent_ID($properties->student_ID);


if ($parent->makeReservation()) {
    //json_encode("Made reservation");
    echo json_encode(array("statusCode bad RES" => 201));
    $parent->setBooking_ID($db_conn->lastInsertId());
    if ($parent->makeDayReservation()) {
        //json_encode("Made DAY reservation");
        echo json_encode(array("statusCode" => 200));
    } else {
        //json_encode("Error in day reservation");
        echo json_encode(array("statusCode" => 201));
    }
} else {
    echo json_encode("Error");
}
//header("Location: http://menjadorescola.me/Menjador/View/User_Parent/Home_Parent.php?username=56142879E");



















/*if (isset($_POST["submit"])) {
    //User
    $parent = new User_Parent($db_conn);

    //id, start date, end date
    $parent->setStudent_ID($_POST["idstudent"]);
    $parent->setStart_date($_POST["date"]);
    $parent->setEnd_Date($_POST["date"]);

    //if ($parent->getStudent_ID() != "") {
        if ($parent->makeReservation()) {
            $parent->setBooking_ID($db_conn->lastInsertId());
            echo json_encode("Made a Booking reservation!");
            if ($parent->makeDayReservation()) {
                echo json_encode("Made reservation for ONE day!");
            }
        } else {
            /* echo $_POST["nomalumne"];
      echo $_POST["pareID"]; 
            echo json_encode("Error");
            //echo json_encode("ERROR");
        }
    //}


    //$last_id = $db_conn->lastInsertId();

}else{
    json_encode("Something wrong with form");
}*/
//header("Location: http://www.menjadorescola.me/Menjador/Controller/api/User_Admin/Insert/Insert_Student.php");