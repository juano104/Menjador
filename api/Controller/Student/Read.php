<?php
if (isset($_POST["username"])) {
    session_start();
    
    //Headers
    include_once '../api/Model/Database.php';
    include_once '../api/Model/User_Parent.php';
    include_once '../api/Model/Student.php';

    //DB
    $db = new Database();
    $db_conn = $db->connect();

    //User
    $user = new User_Parent($db_conn);

    //$user->setUsername(isset($_GET["username"]) ? $_GET["username"] : die());
    $user->setUsername($_POST["username"]);
    $parent_DNI = $user->getUsername();

    $stmt = $user->read();
    $count = $stmt->rowCount();
    
    include_once "../front/View/index.php";
}
