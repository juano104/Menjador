<?php

if(isset($_GET["username"])){
    $username = $_GET["username"];
}else{
    $username = null;
}

$router->define([
    "" => "View/index.html",
    //
    "principal" => "View/View-Principal.php",
    "reservas" => "../api/Controller/Booking/Read.php",
    "insertar" => "../api/Controller/Parent/Read_Child.php"
]);