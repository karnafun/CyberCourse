<?php

session_start();
if (!isset($_SESSION["user"])){
	echo 'You do not belong here';
	die();
}

if (!isset($_POST["password_old"]) || !isset($_POST["password_new"])){
	echo 'You do not belong here';
	die();
}

$DB = new PDO("mysql:host=127.0.0.1;dbname=CyberBank", "root", "");
$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$user = $_SESSION["user"];
$oldPass = $_POST["password_old"];
$newPass = $_POST["password_new"];




	 echo 'user: '.$user . ' - '.'oldpass: '.$oldPass. ' - '.'newpass: '.$newPass;
die();
//Check if  old password is correct:  
	$sqlCmd = $DB->prepare("SELECT  * FROM users WHERE username=:username and password=:password");
	$sqlCmd->execute(array(":username"=>$user,":password"=>$oldPass)) ;


	if ($sqlCmd->rowCount()){
		header("Content-Type: application/json");			
		echo '{"status":false, "data":"password incorrect"}';
		die();
	}

//change password user:	

	$sqlCmd = $DB->prepare("update users set password = :newPassword where username = :username and password=:oldPassword");
	$sqlCmd->execute(array(":username"=>$user,":newPassword"=>$newPass,":oldPassword"=>$oldPass) );
		header("Content-Type: application/json");			
		echo '{"status":true, "data":"Password Changed"}';
		die(); 		
	// if ($sqlCmd->rowCount()) {
		// $results =	$sqlCmd->fetch();
		// $_SESSION["user"] = $results["username"];
		// $_SESSION["user_id"] = $results["id"];
		// header("Content-Type: application/json");			
		// echo '{"status":true, "data":"Logged in"}';
		// die();
	// }else {	
		// header("Content-Type: application/json");			
		// echo '{"status":false, "data":"Invalid username or password"}';
		// die();
	//}


		
 echo 'why are you here?';
 die();
?>
