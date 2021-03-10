<?php
session_start();
if (isset($_SESSION["username"])) {
    include_once "../api/Model/Plate.php";
    include_once "../api/Model/Menu.php";
    include_once "../api/Model/Database.php";

    //DB
    $db = new Database();
    $db_conn = $db->connect();

    $menu = new Menu($db_conn);

    //set properties to user

    $menu->SetDate($_POST["date"]);


    if ($menu->insertMenu()) {
        $last_id = $db_conn->lastInsertId();
    } else {
        echo json_encode("Menu not created, maybe already created?");
    }
    echo "<script type='text/javascript'>alert('$last_id');</script>";
    print_r($_POST["idaliment"]);
    if (isset($_POST["idaliment"])) {

        $idaliment = $_POST["idaliment"];
        $i = 0;
        $maxindex = count($idAliment);
        echo "<script type='text/javascript'>alert('$maxindex');</script>";
        foreach ($idaliment as $selected) {
            echo "<script type='text/javascript'>alert('Entra dedins el bucle');</script>";
            $menu->insertMenuPlate($last_id, $selected);
            $i++;
            if ($i > $maxindex) {
                header("Location: https://intranet.menjadorescola.me/insertar");
            }
        }
    }
} else {
    header("Location: https://intranet.menjadorescola.me/");
}
