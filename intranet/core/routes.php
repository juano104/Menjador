<?php

if(isset($_GET["username"])){
    $username = $_GET["username"];
}else{
    $username = null;
}

$router->define([
    "Insertar" => "../api/Controller/Plate/Read.php",
    //
    "datos" => "../api/Controller/Menu/Read-MenuPlate.php",

    "" => "../api/Controller/Booking/ReadTotalByDay.php",

]);