<?php

session_start();


if (isset($_POST['submit'])) {
    if ((isset($_POST['username']) && $_POST['username'] != '') && (isset($_POST['password']) && $_POST['password'] != '')) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

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

        $pass = $user->readPassword();
        $stmt = $user->read();
        $count = $stmt->rowCount();

        while ($row = $pass->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            if (password_verify($password, $row['password'])) {
                $_SESSION['password'] = $row['password'];

                header('location:../front/View/index.php');
                exit;
            } else {
                $errorMsg =  "Wrong Email Or Password";
            }
        }

        include_once "../front/View/index.php";




        /*$sqlEmail = "select * from users where email = '" . $email . "'";
        $rs = mysqli_query($conn, $sqlEmail);
        $numRows = mysqli_num_rows($rs);

        if ($numRows  == 1) {
            $row = mysqli_fetch_assoc($rs);

            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];

                header('location:dashboard.php');
                exit;
            } else {
                $errorMsg =  "Wrong Email Or Password";
            }
        } else {
            $errorMsg =  "No User Found";
        }
    }*/
    }
}

/*
if (isset($_POST["username"])) {
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
}*/