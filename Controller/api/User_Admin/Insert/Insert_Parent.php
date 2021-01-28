<?php

//header("Location: ../../../../View/User_Admin/Insert.php");
include "../../../../View/User_Admin/Insert.php";
if (isset($_POST["submit"])) {
    //include "../../../../View/User_Admin/Insert.php";
    include_once "../../../../Model/User_Admin.php";
    include_once "../../../../Model/Database.php";

    //GENERAR PASSWORD ALEATORIA
    //Carácteres para la contraseña
    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $password = "";
    //Reconstruimos la contraseña segun la longitud que se quiera
    for ($i = 0; $i < 9; $i++) {
    //obtenemos un caracter aleatorio escogido de la cadena de caracteres
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
            echo json_encode("User created");
            if ($user->insertParent()) {
                echo json_encode("User_Parent created", $password);
            }
        } else {
            echo json_encode("User not created, maybe already created?");
        }
    } else {
        echo json_encode("User not created, password or DNI is null.");
    }
}


