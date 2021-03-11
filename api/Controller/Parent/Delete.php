<?php
session_start();
if (isset($_SESSION["username"])) {
    include_once "../api/Model/User.php";
    include_once "../api/Model/Database.php";

    //DB
    $db = new Database();
    $db_conn = $db->connect();

    //User
    $user = new User($db_conn);

    //set properties to user

    $user->setDNI($_POST["pareDNI"]);
    
            if ($user->deleteUser()) {
                header("Location: https://admin.menjadorescola.me/insertar");
            }
        } else {
            echo json_encode("User not deleted");
        }
