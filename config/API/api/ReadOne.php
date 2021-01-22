<?php

//Headers
include_once '../config/Database.php';
include_once '../class/Person.php';

//DB
$db = new Database();
$db_conn = $db->connect();

//User
$user = new Person($db_conn);

$user->setName(isset($_GET["name"]) ? $_GET["name"] : die());
$user->readOne();

if ($user->getName() != null) {
    // create array
    $user_arr = array(
        "name" => $name,
        "last_name" => $last_name,
        "DNI" => $DNI,
        "birth_date" => $birth_date,
        "role" => $role,
    );

    http_response_code(200);
    echo json_encode($user_arr);
} else {
    http_response_code(404);
    echo json_encode("Person not found.");
}
