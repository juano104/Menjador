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

$stmt = $user->readParent();
$count = $stmt->rowCount();

$student->setName($_POST["nomalumne"]);
$student->setLast_name($_POST["llinatgealumne"]);
$student->setParent_Id($_POST["pareID"]);
$student->setBirth_Date($_POST["date"]);



    if ($student->insertStudent()) {
        echo json_encode("Student created");
    } else {
        echo json_encode("Student not created, maybe already created?");
    }

