<?php

//Headers
include_once '../../../../Model/Database.php';
include_once '../../../../Model/User_Parent.php';
//include_once '../../../../Model/Student.php';

//DB
$db = new Database();
$db_conn = $db->connect();

//User
$parent = new User_Parent($db_conn);

//id, start date, end date
$parent->setStart_date($_POST["dayform"]);
$parent->setEnd_Date($_POST["dayform"]);
$parent->setStudent_ID($_POST["dayform"]);


$parent->setName($_POST["nameform"]);
$parent->setLast_name($_POST["typeform"]);
$parent->setBirth_Date($_POST["dayform"]);


if ($parent->makeReservation()) {
    $parent->setBooking_ID($db_conn->lastInsertId());
    echo json_encode("Made a Booking reservation!");
    if ($parent->makeDayReservation()) {
        echo json_encode("Made reservation for ONE day!");
    }

    //$last_id = $db_conn->lastInsertId();
} else {
    /* echo $_POST["nomalumne"];
      echo $_POST["pareID"]; */
    echo json_encode("ERROR");
}
    
    

    /*$checkbox = $_POST["alergia"];
    $i = 0;
    $maxindex = count($checkBox);
    foreach($checkbox as $selected){
       $student->insertAllergy($last_id ,$selected);
       $i++;
       if($i > $maxindex){
        header("Location: http://www.menjadorescola.me/Menjador/Controller/api/User_Admin/Insert/Insert_Student.php");
       }
    }*/
    
