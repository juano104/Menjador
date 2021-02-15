<?php

if(isset($_GET["username"])){
    $username = $_GET["username"];
}else{
    $username = null;
}

$router->define([
    "" => "View/home_nav.html",
    "login" => "View/index.html",
    "reservas" => "View/reservas.html",
    //
    "home?username=" . $username => "../api/Controller/Student/Read.php",
    "insert" => "../api/Controller/Booking/Insert.php"
]);