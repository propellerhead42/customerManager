<?php

// DB Connection Data
$pw = '';
$user = 'root';
$dbname = 'ctomy';
$dsn = 'mysql:host=localhost;dbname=ctomy';


    try {
        $pdo = new PDO($dsn,$user,$pw);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "PDO error".$e->getMessage();
        die();
    }


?>
