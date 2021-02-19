<?php

if(isset($_GET["username"])){
    $username = $_GET["username"];
}else{
    $username = null;
}

$router->define([
    "" => "View/index.html",
    "reservas" => "../api/Controller/Booking/ReadAllByDay.php",
    //"reservas/parent" => "../api/Controller/Booking/ReadAllByDay.php",
    //
    "home?username=" . $username => "../api/Controller/Student/Read.php",
    "insert" => "../api/Controller/Booking/Insert.php"
]);