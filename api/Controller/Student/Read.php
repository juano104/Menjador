<?php

if (isset($_POST['submit'])) {
    if ((isset($_POST['username']) && $_POST['username'] != '') && (isset($_POST['password']) && $_POST['password'] != '')) {

        session_start();
        $username = trim($_POST['username']);
        $passwordf = trim($_POST['password']);

        $_SESSION["username"] = $_POST["username"];
        $_SESSION["username"] = $_POST["password"];

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
    } else if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
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
    }
}
