<?php

session_start();

include_once 'db-connection.php';
include_once '../include/functions.inc.php';

if(isset($_POST['login'])) {

    if(isset($_POST['email'],$_POST['password']) && !empty($_POST['email']) && !empty($_POST['password']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
 
		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$sql = "SELECT * FROM users WHERE users_email = :email";
			$handle = $pdo->prepare($sql);
			$params = ['email'=>$email];
			$handle->execute($params);
			if($handle->rowCount() > 0)
			{
				$getRow = $handle->fetch(PDO::FETCH_ASSOC);
				if(password_verify($password, $getRow['users_pw']))
				{
					unset($getRow['users_pw']);
					$_SESSION = $getRow;
					header('location: home.php');
					$pdo = null;
				}
				else
				{
					include_once "../include/head.inc.php";
					echo errorElement("Wrong Password or Email");
					echo "<meta http-equiv='refresh' content='2; url=../index.php'>";
				}
			}
			else
			{
				echo "Wrong Email or Password";
				$SESSION['errorMsg'] = "Wrong Email or Password";
			}
			
		}
		else
		{
			echo "Email address is not valid";	
		}
 
	}
	else
	{
		echo "Email and Password are required";	
	}
}

?>



