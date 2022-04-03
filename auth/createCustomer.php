<?php

session_start();

include_once 'db-connection.php';


if(isset($_POST['addCustomer'])) {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $zip = $_POST['zip'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $userId = $_SESSION['users_id'];

    $sql = 'INSERT INTO customers(cust_name, cust_phone, cust_zip, cust_city, cust_street, created_from) VALUES (?, ?, ?, ?, ?, ?)';
    $stmt = $pdo->prepare($sql);

    try{
        $stmt->execute([$name, $phone, $zip, $city, $street, $userId]);
    } catch (Exception $e) {
         echo "Insert failed" . $e;
    }

    echo "<script>alert('Created new Customer successfully')</script>";
    header("location: home.php");
    $pdo = null;

}
?>