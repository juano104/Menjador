<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//Headers
include_once '../config/Database.php';
include_once '../class/User_Admin.php';

//DB
$db = new Database();
$db_conn = $db->connect();

//User
$user = new User_Admin($db_conn);

$stmt = $user->read();
$count = $stmt->rowCount();

echo json_encode($count);


if ($count > 0) {

    $userArr = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $e = array(
            "username" => $username,
            "password" => $password,
            "DNI" => $DNI
        );

        array_push($userArr, $e);
    }
    echo json_encode($userArr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}
