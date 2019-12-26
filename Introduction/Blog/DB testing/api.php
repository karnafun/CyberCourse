<?php

// $sqlCmd = $DB->prepare("SELECT  * FROM users WHERE username=:username");
	// $sqlCmd->execute(array(":username"=>"dor")) ; 
	// $res = $sqlCmd->fetchAll();
// print_r($res);

if (!isset($_POST["action"])){
	echo 'You should not be here';
	die();
} 


$action = $_POST["action"];

switch ($action){
	
	case "login":
	getUser();	 
	break;
	
}

function getUser(){ 
if (!isset($_POST["data"]) || !isset($_POST["data"]["username"]) || !isset($_POST["data"]["password"])){
	echo "Invalid request";
	die();
}
  
	$data = $_POST["data"]; 		
	$username = $data["username"];
	$password= $data["password"];	 


	$DB = new PDO("mysql:host=127.0.0.1;dbname=CyberBlog", "root", "");
	$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sqlCmd = $DB->prepare("SELECT * FROM users WHERE username=:username and password=:password");
	 $sqlCmd->execute(array(":username"=>$username,":password"=>$password)); 
	
	if($sqlCmd->rowCount()>0){
			$res = $sqlCmd->fetch();
			header("content-type: application/json");
			echo '{"username":"'.$$res["username"].'", "password":"'.$res["password"].'", "rowcount":"'.$sqlCmd->rowCount.'"}';
	}else{
		echo 'invalid username or password';
	}
	
	die(); 
	
}
 ?> 
