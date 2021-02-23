<?php

session_start();


if (isset($_POST['submit'])) {
    if ((isset($_POST['username']) && $_POST['username'] != '') && (isset($_POST['password']) && $_POST['password'] != '')) {
        $username = trim($_POST['username']);
        $passwordf = trim($_POST['password']);

        $_SESSION["username"] = $_POST["username"];

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

        if ($count > 0) {
            $userArr = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $e = array(
                    "ID" => $ID,
                    "name" => $name,
                    "last_name" => $last_name,
                    "password" => $password
                );
                array_push($userArr, $e);
                if ($password == $passwordf) {
                    include_once "../front/View/index.php";
                } else {
                    echo "alert(Wrong Password)";
                }
            }
        }
    } else {
        session_start();
        if (isset($_SESSION["name"])) {
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
}
