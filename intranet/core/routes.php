<?php

if(isset($_GET["username"])){
    $username = $_GET["username"];
}else{
    $username = null;
}

$router->define([
    "insertar" => "../api/Controller/Plate/Read.php",
    "insertarPlate" => "../api/Controller/Plate/Insert.php",
    "datosCount" => "../api/Controller/Booking/ReadTotalByDay.php",
    "AllergyCount" => "../api/Controller/Booking/ReadTotalAllergy.php",
    "datos" => "../api/Controller/Menu/Read-MenuPlate.php",
    "insertar/menu" => "../api/Controller/Menu/Insert.php",
    "home" => "View/total.php",
    //"" => "../front/View/login.php",
]);