<?php
session_start();
if (isset($_SESSION["username"])) {

    include_once "../api/Model/Menu.php";
    include_once "../api/Model/Database.php";

    //DB
    $db = new Database();
    $db_conn = $db->connect();

    $updatePrice = new Menu($db_conn);

    $oldprice = $_SESSION["price"];
    $newprice = $_POST["price"];

    $updatePrice->updatePrice($oldprice, $newprice);
    
    $readStmt = $updatePrice->readPrice();
    $rowPrice = $readStmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION["price"] = $rowPrice["price"];
    
    //header("Location: https://admin.menjadorescola.me/home");
} else {
    header("Location: https://admin.menjadorescola.me/");
}
