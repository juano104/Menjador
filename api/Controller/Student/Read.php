<?php

//Headers
include_once 'api/Model/Database.php';
include_once 'api/Model/User_Parent.php';
include_once 'api/Model/Student.php';

//DB
$db = new Database();
$db_conn = $db->connect();

//User
$user = new User_Parent($db_conn);

$user->setUsername(isset($_GET["username"]) ? $_GET["username"] : die());
$parent_DNI = $user->getUsername();

$stmt = $user->read();
$count = $stmt->rowCount();

//echo json_encode($count);


/*if ($count > 0) {

    $userArr = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $e = array(
            "name" => $name,
            "last_name" => $last_name
        );

        array_push($userArr, $e);
    }
    //echo json_encode($userArr);
}*/






//$count = $stmt->rowCount();

/* $userArr = array();


        if ($user->getName() != null) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $e = array(
        "name" => $user->getName(),
        "last_name" => $user->getLast_name(),
        "DNI" => $user->getDNI(),
        "role" => $user->getRole(),
        );
        array_push($userArr, $e);
        }
          } */
include_once "front/View/index.php";
