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

$stmt = $user->readParent();
$count = $stmt->rowCount();

if ($count > 0) {

    $userArr = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $e = array(
            "User.name" => $name,
            "User.last_name" => $last_name,
            "User.DNI" => $DNI,
            "User.name" => $Student_Name,
        );

        array_push($userArr, $e);
    }
    //echo json_encode($userArr);
}

//INCLUDE VIEW PHP
include "../../../../View/User_Admin/View-Admin.php";
