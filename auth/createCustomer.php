<?php

include_once 'db-connection.php';
include_once '../include/functions.inc.php';
include_once '../include/head.inc.php';


if(!isset($_SESSION["users_id"])){
    header("location: ../index.php");
}

if(isset($_POST['addCustomer'])) {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $zip = $_POST['zip'];
    $city = $_POST['city'];
    $street = str_replace("ß", "ss", $_POST['street']);

    $userId = $_SESSION['users_id'];

    $sql = 'INSERT INTO customers(cust_name, cust_phone, cust_zip, cust_city, cust_street, created_from) VALUES (?, ?, ?, ?, ?, ?)';
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$name, $phone, $zip, $city, $street, $userId]);
        echo successElement("Created Customer successfully");
		echo "<meta http-equiv='refresh' content='2; url=../auth/home.php'>";
    } catch (PDOException $e) {
        echo errorElement("An error occured");
		echo "<meta http-equiv='refresh' content='2; url=../auth/home.php'>";
    }
    
    $pdo = null;
}
?>