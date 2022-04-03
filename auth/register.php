<?php 

include_once 'db-connection.php';
include_once '../include/functions.inc.php';
include_once '../include/head.inc.php';

if(!isset($_SESSION['users_id'])){
    header('location: ../index.php');
};
 
if(isset($_POST['register'])) {
    $username = trim($_POST['username']);

    if($username != "" && $_POST['password'] != "" && $_POST['password'] == $_POST['repPwd']){
       
        $username = $_POST['username'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $pwd = $_POST['password'];

        // encrypt pw
        $hashedPw = password_hash($pwd, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(users_username, users_email, users_pw) VALUES (:uName, :uEmail, :uPw)";
        $params = ['uName'=> $username, 'uEmail' => $email, 'uPw' => $hashedPw];
        $stmt = $pdo->prepare($sql);

        if($stmt->execute($params)) {
            echo successElement("Registration successfull");
            echo "<meta http-equiv='refresh' content='2; url=../index.php?reg=succ'>";
        } else {
            echo errorElement("Error Occured");
            echo "<meta http-equiv='refresh' content='2; url=../index.php'>";
        }
        $pdo = null;
    } 
}
?>
