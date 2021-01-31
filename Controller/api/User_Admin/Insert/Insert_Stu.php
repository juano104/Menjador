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

// array allergies

    if ($student->insertStudent()) {
        
        // insert student
        $last_id = $db_conn->lastInsertId();
    } else {
        echo $_POST["nomalumne"];
        echo $_POST["pareID"];
        echo json_encode("Student not created, maybe already created?");
    }
    $checkbox1=$_POST['alergia'];
    // for que crida a $student->insertAllergies($last_id, $allergy_id);

    foreach($_POST['genero'] as $selected){
            $student->insertAllergy($last_id,$selected);
        }

    header("Location: http://www.menjadorescola.me/Menjador/Controller/api/User_Admin/Insert/Insert_Student.php"); 
