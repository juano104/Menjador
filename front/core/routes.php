<?php

$router->define([
    "" => "View/login.php",
    "menu" => "View/Menu.php",
    "ReadReservas" => "../api/Controller/Booking/ReadAllByDay.php",
    "reservas" => "View/reservasCalendar.php",

    "insert" => "../api/Controller/Booking/Insert.php",
    "login" => "../api/Controller/Login/Login.php",
    "home" => "View/index.php",
    "mail" => "../api/Controller/Mail/mail.php",
    "logout" => "View/logout.php",

    
    "test" => "../login.php"
]);
