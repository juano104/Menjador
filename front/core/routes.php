<?php

$router->define([
    "" => "View/login.php",
    "menu" => "View/Menu.php",
    "ReadReservas" => "../api/Controller/Booking/ReadAllByDay.php",
    "reservas" => "View/reservasCalendar.php",

    "insert" => "../api/Controller/Booking/Insert.php",
    "login" => "../api/Controller/Login/Login.php",
    "mail" => "../api/Controller/Mail/mail.php"

]);
