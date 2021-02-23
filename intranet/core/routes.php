<?php

if(isset($_GET["username"])){
    $username = $_GET["username"];
}else{
    $username = null;
}

$router->define([
    "InsertarMenu" => "../api/Controller/Plate/Read.php",
    //
    "datos" => "../api/Controller/Menu/Read-MenuPlate.php",
    "InsertarPlato" => "View/View-Insert-Plate.php",
    //"insertar/menu" => "../api/Controller/Menu/Insert.php",
    
    //to see reservations (total)
    "" => "../api/Controller/Booking/ReadTotalByDay.php",

]);