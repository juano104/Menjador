<?php

//Headers
include_once '../../../Model/Database.php';
include_once '../../../Model/User.php';

//DB
$db = new Database();
$db_conn = $db->connect();

//User
$user = new User($db_conn);

$user->setDNI(isset($_GET["DNI"]) ? $_GET["DNI"] : die());
$user->readOne();
$userArr = array();

if ($user->getName() != null) {
    // create array
    $e = array(
        "name" => $user->getName(),
        "last_name" => $user->getLast_name(),
        "DNI" => $user->getDNI(),
        "role" => $user->getRole()
    );
    array_push($userArr, $e);
    //echo json_encode($userArr);
}
include "../../View/View.php";
