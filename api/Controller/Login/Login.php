<?php

//Headers
include_once '../api/Model/Database.php';
include_once '../api/Model/Login.php';

//DB
$db = new Database();
$db_conn = $db->connect();


$user = new Login($db_conn);

$username = $_POST["username"];
$user->setDNI($username);

$stmt = $user->read();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
$user->setRole($row["role"]);

if($user->getDNI() == $row["DNI"] && $user->getRole() == "admin"){
    header('location: http://admin.menjadorescola.me/');
}else if($user->getDNI() == $row["DNI"] && $user->getRole() == "restaurant"){
    header('location: http://intranet.menjadorescola.me/');
}else if($user->getDNI() == $row["DNI"] && $user->getRole() == "parent"){
    header('location: http://www.menjadorescola.me/home');
}



$booking->setSum($row["title"] ?? '');

$e[] = array(
    "date" => $i,
    "title" => "Reservas: " . $booking->getSum(),
);