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
    //"reservas" => "../api/Controller/Booking/Read.php",
    //"insert/student" => "../api/Controller/Student/Insert.php",
    //"insert/parent" => "../api/Controller/Parent/Insert.php",
]);