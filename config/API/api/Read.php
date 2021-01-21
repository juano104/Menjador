<?php

//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");

//Headers
include_once '../config/Database.php';
include_once '../class/Person.php';

//DB
$db = new Database();
$db_conn = $db->connect();

//User
$user = new Person($db_conn);

$stmt = $user->read();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($outp);
//$count = $stmt->rowCount();

//echo json_encode($count);


/*if ($count > 0) {

    $userArr = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $e = array(
            "Name" => $name,
            "Last_name" => $last_name,
            "DNI" => $DNI,
            "Birth_date" => $birth_date,
            "Role" => $role,
        );

        array_push($userArr, $e);
    }
    echo json_encode($userArr);
}*/
