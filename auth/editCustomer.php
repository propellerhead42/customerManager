<?php

    include_once "../auth/db-connection.php";
    include_once "../include/functions.inc.php";

    $custId = $_GET['id'];

    if(isset($_POST["editCustomer"])) {
       
        $name = trim($_POST['name']);
        $phone = trim($_POST['phone']);
        $zip = trim($_POST['zip']);
        $city = trim($_POST['city']);
        $street = $_POST['street'];

        $sql = 'UPDATE customers SET cust_name=?, cust_phone=?, cust_zip=?, cust_city=?, cust_street=?, edited_at=NOW() WHERE cust_id = ?';
        $stmt = $pdo->prepare($sql);

        try{
            $stmt->execute([$name, $phone, $zip, $city, $street, $custId]);
            echo "<script>alert('Updated Customer successfully')</script>";
            header("location: ../auth/home.php");
        } catch (Exception $e) {
            echo "Insert failed" . $e;
        }

        $pdo = null;

    } else {
        header("location: ../auth/home.php");
    }
    

?>

