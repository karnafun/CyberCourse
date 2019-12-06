<?php
		
session_start();
if (isset($_SESSION["user"])){
	header("Content-Type: application/json");			
	echo '{"status":true, "data":"Logged in"}';
	die();
}

if (!isset($_POST["r_username"]) || !isset($_POST["r_password"])){
	echo 'You do not belong here';
	die();
}

$DB = new PDO("mysql:host=127.0.0.1;dbname=CyberBank", "root", "");
$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Check if exists:
	$sqlCmd = $DB->prepare("SELECT  * FROM users WHERE username=:username");
	$sqlCmd->execute(array(":username"=>$_POST["r_username"]));
	 
	if ($sqlCmd->rowCount()){
		header("Content-Type: application/json");			
		echo '{"status":false, "data":"Username  already exists"}';
		die();
	}

//add user:	
	$sqlCmd = $DB->prepare("insert into users (username,password) values(:username,:password)");
	$sqlCmd->execute(array(":username"=>$_POST["r_username"],":password"=>$_POST["r_password"]) );
		header("Content-Type: application/json");			
		echo '{"status":true, "data":"Registered successfully"}';
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
