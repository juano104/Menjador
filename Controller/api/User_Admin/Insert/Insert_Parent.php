<?php
header("Location: ../../../../View/User_Admin/Insert.php");
if (isset($_POST["submit"])) {
    //include "../../../../View/User_Admin/Insert.php";
    include_once "../../../../Model/User_Admin.php";
    include_once "../../../../Model/Database.php";

    //DB
    $db = new Database();
    $db_conn = $db->connect();

    //User
    $user = new User_Admin($db_conn);
    /*
$properties = json_decode(file_get_contents("php://input"));
//set properties
$user->setName($properties->name);
$user->setLast_name($properties->last_name);
$user->setDNI($properties->DNI);
$user->setRole($properties->role);
$user->setUsername($properties->DNI);
$user->setPassword($properties->password);*/

    $user->setName($_POST["name"]);
    $user->setLast_name($_POST["last_name"]);
    $user->setDNI($_POST["DNI"]);
    $user->setRole($_POST["role"]);
    $user->setUsername($_POST["DNI"]);
    $user->setPassword($_POST["password"]);

    if ($user->getDNI() != "" || $user->getPassword() != "") {
        if ($user->insertUser()) {
            echo json_encode("User created");
            if ($user->insertParent()) {
                echo json_encode("User_Parent created");
            }
        } else {
            echo json_encode("User not created, maybe already created?");
        }
    } else {
        echo json_encode("User not created, password or DNI is null.");
    }
}
