<?php


$router->define([
    "insertar" => "../api/Controller/Plate/Read.php",
    "insertarPlate" => "../api/Controller/Plate/Insert.php",
    "datosCount" => "../api/Controller/Booking/ReadTotalByDay.php",
    "AllergyCount" => "../api/Controller/Booking/ReadTotalAllergy.php",
    "datos" => "../api/Controller/Menu/Read-MenuPlate.php",
    "insertar/menu" => "../api/Controller/Menu/Insert.php",
    "" => "View/login.php",
    "login" => "View/total.php"
    //"home" => "View/total.php",
]);