<?php
include "../../../../View/User_Admin/View-Admin.php";
if (isset($_POST["submit"])) {
//Headers
include_once '../../../../Model/Database.php';
include_once '../../../../Model/User.php';

//DB
$db = new Database();
$db_conn = $db->connect();

//User
$user = new User($db_conn);
$student = new Student($db_conn);

$stmt = $user->readParent();
$count = $stmt->rowCount();

//echo json_encode($count);

$user->setName($_POST["nompare"]);
$user->setLast_name($_POST["llinatgepare"]);
$user->setDNI($_POST["dnipare"]);




if ($count > 0) {

    $userArr = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $e = array(
            "name" => $name,
            "last_name" => $last_name,
            "DNI" => $DNI,
        );

        array_push($userArr, $e);
    }
    //echo json_encode($userArr);
}

$student->setName($_POST["nomalumne"]);
$student->setLast_name($_POST["llinatgealumne"]);
$student->setParent_Id($_POST["pareID"]);
$student->setBirth_Date($_POST["date"]);



    if ($student->insertStudent()) {
        echo json_encode("Student created");
    } else {
        echo json_encode("Student not created, maybe already created?");
    }
//INCLUDE VIEW PHP

}