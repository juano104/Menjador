<?php

//Headers
include_once '../../../Model/Database.php';
include_once '../../../Model/Person.php';

//DB
$db = new Database();
$db_conn = $db->connect();

//User
$user = new Person($db_conn);

$stmt = $user->read();
$count = $stmt->rowCount();

//echo json_encode($count);


if ($count > 0) {

    $userArr = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $e = array(
            "name" => $name,
            "last_name" => $last_name,
            "DNI" => $DNI,
            "birth_date" => $birth_date,
            "role" => $role,
        );

        array_push($userArr, $e);
    }
    //echo json_encode($userArr);
}
//INCLUDE VIEW PHP
include "../../../View/View.php";