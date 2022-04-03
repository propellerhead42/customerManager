<?php

session_start();
include_once 'db-connection.php';
include_once '../include/functions.inc.php';

if(isset($_SESSION["users_id"])) {

    $custId = $_GET['id'];

    $sql = "DELETE FROM customers WHERE cust_id = $custId;";

    $pdo->exec($sql);
    $pdo = null;

    echo errorElement("Deleted Customer");
    echo "<meta http-equiv='refresh' content='2; url=../index.php'>";

}

header("location: home.php");
?>

