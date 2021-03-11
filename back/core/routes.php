<?php


$router->define([
    "" => "View/login.php",
    "login" => "../api/Controller/Login/Login.php",
    "home" => "../api/Controller/Booking/ReadByDay.php",
    "reservasAdmin" => "../api/Controller/Booking/Read.php",
    "insert/student" => "../api/Controller/Student/Insert.php",
    "insert/parent" => "../api/Controller/Parent/Insert.php",
    "insertar" => "../api/Controller/Parent/Read_Child.php",
    "eliminar" => "../api/Controller/Parent/Delete.php",
    "actualizar" => "../api/Controller/Menu/updatePrice.php",
    
    "logout" => "View/logout.php"

]);
