<?php

if(isset($_GET["username"])){
    $username = $_GET["username"];
}else{
    $username = null;
}

$router->define([
    "" => "../api/Controller/Plate/Read.php",
    //
    "datos" => "../api/Controller/Menu/Read-MenuPlate.php",
    "insertar" => "View/View-Insert-Plate.php",
    "insertar/menu" => "../api/Controller/Menu/Insert.php",
    
    //to see reservations (total)
    "total" => "../api/Controller/Booking/ReadTotalByDay.php",

]);