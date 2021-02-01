<?php
//Headers
include_once '../../../../Model/Database.php';
include_once '../../../../Model/User.php';
include_once '../../../../Model/Student.php';

//DB
$db = new Database();
$db_conn = $db->connect();

//User
$user = new User($db_conn);
$student = new Student($db_conn);


$student->setName($_POST["nomalumne"]);
$student->setLast_name($_POST["llinatgealumne"]);
$student->setBirth_Date($_POST["date"]);
$student->setParent_Id($_POST["pareID"]);



    if ($student->insertStudent()) {
        $last_id = $db_conn->lastInsertId();
    } else {
        echo $_POST["nomalumne"];
        echo $_POST["pareID"];
        echo json_encode("Student not created, maybe already created?");
    }

    $checkbox = $_POST["alergia"];

    foreach($checkbox as $selected){
       if( $student->insertAllergy($last_id,$selected)){
           echo json_encode("funciona :D");
           echo $selected;
       }else{
           echo json_encode("No funciona D:");
           echo $selected;
       }
    }
    
