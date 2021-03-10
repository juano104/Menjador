<?php
session_start();
if (isset($_SESSION["username"])) {
    //Headers
    include_once '../api/Model/Database.php';
    include_once '../api/Model/User.php';
    include_once '../api/Model/Student.php';

    //DB
    $db = new Database();
    $db_conn = $db->connect();

    //User
    $user = new User($db_conn);
    $student = new Student($db_conn);


    $student->setName($_POST["nomalumne"]);
    $student->setLast_name($_POST["llinatgealumne"]);
    $student->setBirth_Date($_POST["date"]);
    $student->setParent_Id($_POST["pareID"]);
    $student->setClass($_POST["class"]);



    if ($student->insertStudent()) {
        $last_id = $db_conn->lastInsertId();
    } else {
        echo $_POST["nomalumne"];
        echo $_POST["pareID"];
        echo json_encode("Student not created, maybe already created?");
    }
    if (!isset($_POST["alergia"])) {
        header("Location: https://admin.menjadorescola.me/insertar");
    }
    if (isset($_POST["alergia"])) {
        $checkbox = $_POST["alergia"];
        $i = 0;
        $maxindex = count($checkBox);
        foreach ($checkbox as $selected) {
            $student->insertAllergy($last_id, $selected);
            $i++;
            if ($i > $maxindex) {
                header("Location: https://admin.menjadorescola.me/insertar");
            }
        }
    }
} else {
    header("Location: https://admin.menjadorescola.me/");
}
