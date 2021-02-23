<?php

//if (isset($_POST["username"])) {
session_start();
$_SESSION["username"] = $_POST["username"];
//$user = $_SESSION["username"];

$_SESSION["name"] = "login";
//Headers
include_once '../api/Model/Database.php';
include_once '../api/Model/User_Parent.php';
include_once '../api/Model/Student.php';

//DB
$db = new Database();
$db_conn = $db->connect();

//User
$user = new User_Parent($db_conn);

$user->setUsername($_SESSION["username"]);
$parent_DNI = $user->getUsername();

$stmt = $user->read();
$count = $stmt->rowCount();

include_once "../front/View/index.php";
//}
