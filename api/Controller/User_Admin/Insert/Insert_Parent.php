<?php

    include_once "../../../Model/User_Admin.php";
    include_once "../../../Model/Database.php";

    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $password = "";
    for ($i = 0; $i < 9; $i++) {
        $password .= substr($str, rand(0, 62), 1);
    }

    //DB
    $db = new Database();
    $db_conn = $db->connect();

    //User
    $user = new User_Admin($db_conn);

    //set properties to user

    $user->setName($_POST["nompare"]);
    $user->setLast_name($_POST["llinatgepare"]);
    $user->setDNI($_POST["dnipare"]);
    $user->setUsername($_POST["dnipare"]);
    $user->setPassword($password);

    if ($user->getDNI() != "" || $user->getPassword() != "") {
        if ($user->insertUser()) {
            if ($user->insertParent()) {
                header("Location: http://www.menjadorescola.me/Menjador/api/Controller/User_Admin/Insert/View_Student.php");
            }
        } else {
            echo json_encode("User not created, maybe already created?");
        }
    } else {
        echo json_encode("User not created, password or DNI is null.");
    }



