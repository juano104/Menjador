<?php


$router->define([
    "insertar" => "../api/Controller/Plate/Read.php",
    "insertarPlate" => "../api/Controller/Plate/Insert.php",
    "datosCount" => "../api/Controller/Booking/ReadTotalByDay.php",
    "AllergyCount" => "../api/Controller/Booking/ReadTotalAllergy.php",
    "datos" => "../api/Controller/Menu/Read-MenuPlate.php",
    "insertar/menu" => "../api/Controller/Menu/Insert.php",
    "" => "View/login.php",
    "login" => "../api/Controller/Login/Login.php",
    "home" => "View/total.php",
    "logout" => "View/logout.php"
]);