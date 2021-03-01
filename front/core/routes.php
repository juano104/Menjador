<?php

if(isset($_GET["username"])){
    $username = $_GET["username"];
}else{
    $username = null;
}

$router->define([
    "" => "View/login.php",
    "menu" => "View/Menu.php",
    "ReadReservas" => "../api/Controller/Booking/ReadAllByDay.php",
    "reservas" => "View/reservasCalendar.php",
    
    
    //"reservas/parent" => "../api/Controller/Booking/ReadAllByDay.php",
    //

    "home" => "../api/Controller/Student/Read.php",
    "insert" => "../api/Controller/Booking/Insert.php"
]);