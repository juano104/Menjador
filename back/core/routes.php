<?php

if(isset($_GET["username"])){
    $username = $_GET["username"];
}else{
    $username = null;
}

$router->define([
    "" => "View/index.html",
    //
    "principal" => "../api/Controller/Booking/Read.php",
    "reservas" => "View/View-Booking.php",
    "insertar" => "View/View-Admin.php"
]);