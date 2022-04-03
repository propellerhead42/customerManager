<?php 

include 'db-connection.php';
 
if(isset($_POST['register'])){

    $name = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $repPwd = $_POST["repPwd"];

    // check input !empty
    if (!empty($name) && !empty($pwd) && !empty($email) && !empty($repPwd)) {
        // pw should match
        if($pwd == $repPwd){
            $hashedPw = password_hash($pwd, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users(users_username, users_email, users_pw) VALUES (:uName, :uEmail, :uPw)";
            $stmt = $pdo->prepare($sql);
            $params = ['uName'=> $name, 'uEmail' => $email, 'uPw' => $hashedPw];
            $stmt->execute($params);

        } else {
            echo "PW false";
        }
    } else {
        echo "empty input";
    }
} else {
    // post vars not set
    echo "PASSIERT NIX";
}

// reload to index after to 2 sec. (@retzl);
echo "Registration successfull";
echo "<meta http-equiv='refresh' content='2; url=../index.php'>";

// header('location: ../index.php');


?>
