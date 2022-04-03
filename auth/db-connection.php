<?php
session_start();
include_once "../include/functions.inc.php";

if(!isset($_SESSION["users_id"])){
    header("location: ../index.php");
}

// DB Connection Data
$pw = '';
$user = 'root';
$dbname = 'ctomy';
$dsn = 'mysql:host=localhost;dbname=ctomy';

try {
    $pdo = new PDO($dsn,$user,$pw);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // echo "PDO Connection error: " . $e->getMessage();
    include "../include/head.inc.php";
    echo errorElement("PDO Error ");
    die();
}

?>
