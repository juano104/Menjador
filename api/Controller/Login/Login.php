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

//$stmt = $user->read();

$row = $user->read()->fetch(PDO::FETCH_ASSOC);
$user->setRole($row["role"]);

if($user->getDNI() == $row["DNI"] && $user->getRole() == "admin"){
    //header('location: http://admin.menjadorescola.me/');
    header('location: https://www.google.com/');
}else if($user->getDNI() == $row["DNI"] && $user->getRole() == "restaurant"){
    //header('location: http://intranet.menjadorescola.me/');
    header('location: https://www.youtube.com/');
}else if($user->getDNI() == $row["DNI"] && $user->getRole() == "parent"){
    //header('location: http://www.menjadorescola.me/home');
    header('location: https://www.amazon.com/');
}else{
    echo "<script>
            alert('Access Denied!');
        </script>";
}