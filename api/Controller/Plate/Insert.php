<?php

include_once "../api/Model/Plate.php";
include_once "../api/Model/Database.php";

//DB
$db = new Database();
$db_conn = $db->connect();

$plate = new Plate($db_conn);
$nomPlat = $_POST["nomplat"];
//set properties to user


$resultat = $plate->ifExistsPlate($nomPlat);

if ($resultat === true) {

    $plate->setName($_POST["nomplat"]);
    $plate->setType($_POST["tipus"]);
    echo $_POST["nomplat"];
    $_POST["tipus"];
    if ($plate->insertPlate()) {
        header("Location: http://localhost/Menjador/front/public/View-Insert-Plate.php");
    } else {
        echo json_encode("Plate not created");
    }
}else{
    echo '<script>alert("El plat que vol inserir ja existeix")</script>';
    header("Location: http://localhost/Menjador/front/public/View-Insert-Plate.php");
}
