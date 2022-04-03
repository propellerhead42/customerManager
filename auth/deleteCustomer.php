<?php

include_once 'db-connection.php';

global $pdo;

$custId = $_GET['id'];

$sql = "DELETE FROM customers WHERE cust_id = $custId;";

try {
    $pdo->exec($sql);
} catch (PDOException $e){
    echo $e->getMessage();
}

echo "<script>alert('Created new Customer successfully')</script>";
header("location: home.php");
$pdo = null;

?>

