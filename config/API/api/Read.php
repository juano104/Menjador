<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//Headers
include_once '../config/Database.php';
include_once '../class/Person.php';

//DB
$db = new Database();
$db_conn = $db->connect();

//User
$user = new Person($db_conn);

$stmt = $user->read();
$count = $stmt->rowCount();

echo json_encode($count);


if ($count > 0) {

    $userArr = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $e = array(
            "Name" => $user->GetName(),
            "Last Name" => $user->GetLast_name(),
            "DNI" => $user->GetDNI(),
            "Brith Date" => $user->GetBirth_date(),
            "Role" => $user->GetRole(),
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
