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
    "datos" => "../api/Controller/Menu/Read-MenuPlate.php",
    "insertar/menu" => "../api/Controller/Menu/Insert.php",
    "" => "../api/Controller/Booking/ReadTotalByDay.php",
]);