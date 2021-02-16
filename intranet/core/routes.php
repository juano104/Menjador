<?php

if(isset($_GET["username"])){
    $username = $_GET["username"];
}else{
    $username = null;
}

$router->define([
    "" => "View/index.html",
    //
    "principal" => "../api/Controller/Plate/Read.php",
    //"datos" => "../api/Controller/Menu/Read-MenuPlate.php",
    "insertar" => "View/View-Insert-Plate.php",
    "insertar/plate" => "../api/Controller/Plate/Insert.php",
    "insertar/menu" => "../api/Controller/Menu/Insert.php"
    //"reservas" => "../api/Controller/Booking/Read.php",
    //"insert/student" => "../api/Controller/Student/Insert.php",
    //"insert/parent" => "../api/Controller/Parent/Insert.php",
]);