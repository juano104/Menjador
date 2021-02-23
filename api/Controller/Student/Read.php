<?php
session_start();
if (isset($_POST['submit'])) {
    if ((isset($_POST['username']) && $_POST['username'] != '') && (isset($_POST['password']) && $_POST['password'] != '')) {

        $_SESSION["username"] = trim($_POST['username']);
        $_SESSION["password"] = trim($_POST['password']);

        $username = $_SESSION["username"];
        $passwordf = $_SESSION["password"];

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
        $pass = $user->readPassword();
        $countpass = $pass->rowCount();

        if ($countpass  == 1) {
            $row = $pass->fetch(PDO::FETCH_ASSOC);
            extract($row);

            if ($passwordf == $row['password']) {
                include_once "../front/View/index.php";
            } else {
                header("Location: http://www.menjadorescola.me/");
                echo "<script>alert('Wrong Password')</script>";
            }
        }
    }
} else {
    //session_start();
    //if (isset($_SESSION["username"])) {
    //Headers
    $username = $_SESSION["username"];
    $passwordf = $_SESSION["password"];
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
}
