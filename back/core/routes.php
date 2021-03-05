<?php

if(isset($_GET["username"])){
    $username = $_GET["username"];
}else{
    $username = null;
}

$router->define([
    
    "" => "../api/Controller/Booking/ReadByDay.php",
    "home" => "../api/Controller/Booking/ReadByDay.php",
    "reservasAdmin" => "../api/Controller/Booking/Read.php",
    "insert/student" => "../api/Controller/Student/Insert.php",
    "insert/parent" => "../api/Controller/Parent/Insert.php",
    "insertar" => "../api/Controller/Parent/Read_Child.php",
    
]);