<?php

/*//Headers
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

if ($user->getDNI() == $row["DNI"] && $user->getRole() == "admin") {
    header('location: http://admin.menjadorescola.me/');
    //header('location: https://www.google.com/');
} else if ($user->getDNI() == $row["DNI"] && $user->getRole() == "restaurant") {
    header('location: http://intranet.menjadorescola.me/');
    //header('location: https://www.youtube.com/');
} else if ($user->getDNI() == $row["DNI"] && $user->getRole() == "parent") {
    header('location: http://www.menjadorescola.me/home');
    //header('location: https://www.amazon.com/');
} else {
    echo "<script>
            alert('Access Denied!');
        </script>";
}*/


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
        include_once '../api/Model/Login.php';

        //DB
        $db = new Database();
        $db_conn = $db->connect();

        //for login
        $login = new Login($db_conn);
        $login->setDNI($_SESSION["username"]);
        $rowlog = $login->read()->fetch(PDO::FETCH_ASSOC);
        $login->setRole($row["role"]);
        $passparent = $login->readPasswordParent($_SESSION["username"]);
        $passadmin = $login->readPasswordAdmin($_SESSION["username"]);
        $passrest = $login->readPasswordRest($_SESSION["username"]);
        $countpassp = $passparent->rowCount();
        $countpassa = $passadmin->rowCount();
        $countpassr = $passrest->rowCount();

        //User Parent
        $user = new User_Parent($db_conn);

        $user->setUsername($_SESSION["username"]);
        $parent_DNI = $user->getUsername();

        $stmt = $user->read();
        $count = $stmt->rowCount();
        //$pass = $user->readPassword();
        //$countpass = $pass->rowCount();

        if ($countpassp  == 1) {
            $row = $passparent->fetch(PDO::FETCH_ASSOC);
            extract($row);

            if ($passwordf == $row['password']) {
                /*if ($login->getDNI() == $rowlog["DNI"] && $login->getRole() == "admin") {
                    header('location: http://admin.menjadorescola.me/');
                    //header('location: https://www.google.com/');
                } else if ($login->getDNI() == $rowlog["DNI"] && $login->getRole() == "restaurant") {
                    header('location: http://intranet.menjadorescola.me/');
                    //header('location: https://www.youtube.com/');
                } else*/
                if ($login->getDNI() == $rowlog["DNI"] && $login->getRole() == "parent") {
                    include_once "../front/View/index.php";
                    //header('location: http://www.menjadorescola.me/home');
                    //header('location: https://www.amazon.com/');
                } else {
                    echo "<script>
                            alert('Access Denied!');
                        </script>";
                }
            } else {
                //header("Location: http://www.menjadorescola.me/");
                echo "<script>alert('Wrong Password')</script>";
            }
        }
        if ($countpassa  == 1) {
            $row = $passadmin->fetch(PDO::FETCH_ASSOC);
            extract($row);

            if ($passwordf == $row['password']) {
                if ($login->getDNI() == $rowlog["DNI"] && $login->getRole() == "admin") {
                    header('location: http://admin.menjadorescola.me/');
                    //header('location: https://www.google.com/');
                } else {
                    echo "<script>
                            alert('Access Denied!');
                        </script>";
                }
            } else {
                //header("Location: http://www.menjadorescola.me/");
                echo "<script>alert('Wrong Password')</script>";
            }
        }
        if ($countpassr  == 1) {
            $row = $passrest->fetch(PDO::FETCH_ASSOC);
            extract($row);

            if ($passwordf == $row['password']) {
                if ($login->getDNI() == $rowlog["DNI"] && $login->getRole() == "restaurant") {
                    header('location: http://intranet.menjadorescola.me/');
                    //header('location: https://www.youtube.com/');
                } else {
                    echo "<script>
                            alert('Access Denied!');
                        </script>";
                }
            } else {
                //header("Location: http://www.menjadorescola.me/");
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
