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
    "reservasAdmin" => "../api/Controller/Booking/Read.php",
    "insert/student" => "../api/Controller/Student/Insert.php",
    "insert/parent" => "../api/Controller/Parent/Insert.php",
    "insertar" => "../api/Controller/Parent/Read_Child.php",

    // to see reservations
    //"reservations" => "View/View-Reservas.php",
    "reservations" => "../api/Controller/Booking/ReadByDay.php",

]);