<?php
session_start();
if (isset($_SESSION["username"])) {

    include_once "../api/Model/Menu.php";
    include_once "../api/Model/Database.php";

    //DB
    $db = new Database();
    $db_conn = $db->connect();
    

    $oldprice = $_SESSION["price"];
    $newprice = $_POST["price"];

    $updatePrice->updatePrice($oldprice, $newprice);
    header("Location: https://admin.menjadorescola.me/home");
} else {
    header("Location: https://admin.menjadorescola.me/");
}
