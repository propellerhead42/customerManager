<?php 

session_start();
include_once 'db-connection.php';
include_once '../include/head.inc.php';

if(isset($_POST['register'])) {
    $username = trim(htmlspecialchars($_POST['username']));
    $email = trim(htmlspecialchars($_POST['email']));
    $pwd = trim(htmlspecialchars($_POST['password']));
    $repPwd = trim(htmlspecialchars($_POST['repPwd']));

    //Verifcation 
    if (empty($username) || empty($email) || empty($pwd) || empty($repPwd)){
        $errorMsg = "Complete all fields";
    }

    // Password match
    if ($pwd != $repPwd){
        $errorMsg = "Passwords don't match";
    }

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errorMsg = "Enter a  valid email";
    }

    // Password length
    if (strlen($pwd) <= 6){
        $errorMsg = "Choose a password longer then 8 character";
    }

    if(!isset($errorMsg)){
    //no error
    $sthandler = $pdo->prepare("SELECT users_username FROM users WHERE users_username = :uName");
    $sthandler->bindParam(':uName', $username);
    
    if($sthandler->rowCount() > 0){
        $errorMsg = 'exists! cannot insert';
        
    } else {

        // hash pw
        $hashedPw = password_hash($pwd, PASSWORD_DEFAULT);

        //Securly insert into database
        $sql = 'INSERT INTO users (users_username, users_email, users_pw) VALUES (:uName,:uEmail,:pw)';    
        $query = $pdo->prepare($sql);
        $query->execute(array(
            ':uName' => $username,
            ':uEmail' => $email,
            ':pw' => $hashedPw // insert the encrypted pw
        ));

        header('location: ../index.php?uCrt');
    }
    }else{
        header('location: ../index.php?fUcrt');
        exit();
    }
}      
?>
