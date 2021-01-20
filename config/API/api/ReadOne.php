<?php

//Headers
include_once '../config/Database.php';
include_once '../class/Person.php';

//DB
$db = new Database();
$db_conn = $db->connect();

//User
$user = new Person($db_conn);

$user->setDNI(isset($_GET["DNI"]) ? $_GET["DNI"] : die());
$user->readOne();

if ($user->getName() != null) {
    // create array
    $user_arr = array(
        "DNI" =>  $user->getDNI(),
        "name" => $user->getName(),
        "last_name" => $user->getLast_name(),
        "role" => $user->getRole()
    );

    http_response_code(200);
    echo json_encode($user_arr);
} else {
    http_response_code(404);
    echo json_encode("Employee not found.");
}
