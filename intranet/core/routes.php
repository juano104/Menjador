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
    "datos?start=2021-02-01&end=2021-03-01&_=1613466702873" => "../api/Controller/Menu/Read-MenuPlate.php",
    //"datos?start=2021-02-01&end=2021-03-01&_=1613466702873",
    "insertar" => "View/View-Insert-Plate.php",
    "insertar/plate" => "../api/Controller/Plate/Insert.php",
    "insertar/menu" => "../api/Controller/Menu/Insert.php"
    //"reservas" => "../api/Controller/Booking/Read.php",
    //"insert/student" => "../api/Controller/Student/Insert.php",
    //"insert/parent" => "../api/Controller/Parent/Insert.php",
]);