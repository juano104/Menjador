<?php

include_once "../../../../Model/User_Admin.php";
include_once "../../../../Model/Database.php";

//DB
$db = new Database();
$db_conn = $db->connect();

//User
$user = new User_Admin($db_conn);

$properties = json_decode(file_get_contents("php://input"));
//set properties
$user->setName($properties->name);
$user->setLast_name($properties->last_name);
$user->setDNI($properties->DNI);
$user->setRole($properties->role);

if ($user->insert()) {
    echo json_encode("User created");
} else {
    echo json_encode("User not created");
}