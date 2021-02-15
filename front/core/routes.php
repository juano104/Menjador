<?php

if(isset($_GET["username"])){
    $username = $_GET["username"];
}else{
    $username = null;
}

$router->define([
    "" => "View/index.html",
    //"login" => "front/login.html",
    //"login" => "api/Controller/Student/Read.php",
    "home?username=" . $username => "../api/Controller/Student/Read.php",
    "insert" => "../api/Controller/Booking/Insert.php"
]);