<?php

if(isset($_GET["username"])){
    $username = $_GET["username"];
}else{
    $username = null;
}

$router->define([
    "insertar" => "../api/Controller/Plate/Read.php",
    "insertarPlate" => "../api/Controller/Plate/Insert.php",
    "datos" => "../api/Controller/Menu/Read-MenuPlate.php",

    "" => "../api/Controller/Booking/ReadTotalByDay.php",

]);