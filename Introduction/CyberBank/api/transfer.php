<?php

session_start();

if (      !isset($_SESSION["user"])   ||   !isset($_POST["t_amount"]) || !isset($_POST["t_receiver"]) ){
	echo 'you do not belong here';	
	die();
}

$DB = new PDO("mysql:host=127.0.0.1;dbname=CyberBank", "root", "");
$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Check if user have enough money   	 
$sqlCmd = $DB->prepare("SELECT  balance FROM users WHERE username=:username ");
$sqlCmd->execute(array(":username"=>$_SESSION["user"]));

$userData = $sqlCmd->fetch();
$amount = $_POST["t_amount"];

if ($userData["balance"] < $amount){
	//err
	header("Content-Type: application/json");			
	echo '{"status":false, "data":"Not enough money "}'; 
	die();
}else if($_POST["t_receiver"] == $_SESSION["user"]){
	header("Content-Type: application/json");			
	echo '{"status":false, "data":"You cannot transfer money to yourself"}'; 
	die();
}else if($amount <=0){
	header("Content-Type: application/json");			
	echo '{"status":false, "data":"Invalid Amount"}'; 
	die();	
}else{
	
	//Check that the receiver is valid
	$sqlCmd = $DB->prepare("SELECT  * FROM users WHERE username=:receiver ");
	$sqlCmd->execute(array(":receiver"=>$_POST["t_receiver"]));
	if (!$sqlCmd->rowCount()){
		header("Content-Type: application/json");			
		echo '{"status":false, "data":"Invalid Receiver"}'; 
		die();		
	}
	// Add money to sender
	$sqlCmd = $DB->prepare("update users set balance = balance +:amount where username = :receiver");
	$sqlCmd->execute(array(":amount"=>$amount, ":receiver"=>$_POST["t_receiver"]));
	
	//Deduct money from sender
	$sqlCmd = $DB->prepare("update users set balance = balance -:amount where username = :sender");
	$sqlCmd->execute(array(":amount"=>$amount, ":sender"=>$_SESSION["user"]));
	
	// Add to transactions table?? 

	$sqlCmd = $DB->prepare("insert into transactions (sender,receiver,amount) values (:sender,:receiver,:amount)");
	$sqlCmd->execute(array(":sender"=>$_SESSION["user"],":receiver"=>$_POST["t_receiver"],":amount"=>$_POST["t_amount"]));

	
	// $sqlCmd = $DB->prepare("select top(3) * from transactions where sender == :user or receiver == :user");
	// $sqlCmd->execute(array(":user"=>$user))	
	
	
	header("Content-Type: application/json");			
	echo '{"status":true, "data":"Transaction completed successfully"}'; 
	die();
}

	
 echo 'why are you here?';
 die();
?>
