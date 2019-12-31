<?php

// $sqlCmd = $DB->prepare("SELECT  * FROM users WHERE username=:username");
	// $sqlCmd->execute(array(":username"=>"dor")) ; 
	// $res = $sqlCmd->fetchAll();
// print_r($res);

session_start();
if (!isset($_REQUEST["action"])){
	echo 'You should not be here';
	die();
} 



$action = $_REQUEST["action"];

switch ($action){
	
	case "login":
		getUser();	 
	break;
	case "register":
		register();
	break;
	case "getPostById":
		getPostById();
	break;
	case "createPost":
		createPost();
	break;
	case "getAllUsers":
		getAllUsers();
	break; 
	case "getPostsByAuthor":
		getPostsByAuthor();
	break;
	default: 
		echo " unknown action ".$action;
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
	$_SESSION["user"] = $username;

	$DB = new PDO("mysql:host=127.0.0.1;dbname=CyberBlog", "root", "");
	$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sqlCmd = $DB->prepare("SELECT * FROM users WHERE username=:username and password=:password");
	 $sqlCmd->execute(array(":username"=>$username,":password"=>$password)); 
header("content-type: application/json");
	if($sqlCmd->rowCount() >0){
			$res = $sqlCmd->fetch();
			
			
			echo '{"username":"'.$res["username"].'", "password":"'.$res["password"].'"}';
	}else{
			
			echo '{"status":"failed", "message":"Invalid username or password"}';
	}
	
	die(); 
	
}
 
 
 function register(){
	 if (!isset($_POST["data"]) || !isset($_POST["data"]["username"]) || !isset($_POST["data"]["password"]) || !isset($_POST["data"]["email"])){
	echo "Invalid request";
	die();
}
  
	$data = $_POST["data"]; 		
	$username = $data["username"];
	$password= $data["password"];	 
	$email= $data["email"];	 


	$DB = new PDO("mysql:host=127.0.0.1;dbname=CyberBlog", "root", "");
	$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sqlCmd = $DB->prepare("SELECT * FROM users WHERE username=:username");
	$sqlCmd->execute(array(":username"=>$username)); 

	if($sqlCmd->rowCount() ==0){
			//Get the username from the database to verifyit worked:
		$DB = new PDO("mysql:host=127.0.0.1;dbname=CyberBlog", "root", "");
		$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sqlCmd = $DB->prepare("insert into users values (null,:username, :email,:password)");
		$sqlCmd->execute(array(":username"=>$username,":email"=>$email,":password"=>$password)); 
		if($sqlCmd->rowCount() >0){						
		//get the user from the DB 
		$sqlCmd = $DB->prepare("select * from users where username =  :username and password = :password");
		$sqlCmd->execute(array(":username"=>$username,":password"=>$password)); 
		$res = $sqlCmd->fetch();
			header("content-type: application/json");
			echo '{"username":"'.$res["username"].'", "password":"'.$res["password"].'"}';			
		}else{
			echo 'Failed adding user: "'.$username.'" to database';
		}
		
	}else{
		echo 'Username already exist';
	}
	
	die(); 
	
 }
 
 
function getPostById(){
	
	if (!isset($_POST["data"]) || !isset($_POST["data"]["postId"])){
		echo "Invalid request";
		die();
	}
  
	$data = $_POST["data"]; 		
	$postId= $data["postId"];
	


	$DB = new PDO("mysql:host=127.0.0.1;dbname=CyberBlog", "root", "");
	$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sqlCmd = $DB->prepare("SELECT * FROM posts WHERE id=:postId");
	$sqlCmd->execute(array(":postId"=>$postId)); 
 
	if($sqlCmd->rowCount() >0){ 
			$res = $sqlCmd->fetch();			
			header("content-type: application/json"); 			
			// echo '{"pizda":"'.$res["id"].'"}';
			 $arr = '{"id":"'.$res["id"].'", "author":"'.$res["author"].'" , "content":"'.$res["content"].'"}';
			echo '{"post":'.$arr.'}';
	}else{
		echo "Couldn't find your post";
	}

	die(); 
	
}
 
 
 function createPost(){

	  if (!isset($_POST["data"]) || !isset($_POST["data"]["author"])){
		echo "Invalid request";
		die();
}
  
	$data = $_POST["data"]; 		 	
	$author= $data["author"];	 
	$content= $data["content"];	 


	$DB = new PDO("mysql:host=127.0.0.1;dbname=CyberBlog", "root", "");
	$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
	$sqlCmd = $DB->prepare("insert into posts values (null,:author,:content)");
	$sqlCmd->execute(array(":author"=>$author,":content"=>$content)); 
	if($sqlCmd->rowCount() >0){							
	$sqlCmd = $DB->prepare("select * from posts where author =  :author and content= :content order by id desc");
	$sqlCmd->execute(array(":author"=>$author,":content"=>$content)); 
	$res = $sqlCmd->fetch();
		header("content-type: application/json");
		echo '{"id":"'.$res["id"].'","author":"'.$res["author"].'", "content":"'.$res["content"].'"}';			
	}else{
		echo 'Failed adding the post to the database';
	}
	
	die(); 
	
 }
 
 
  
 function getAllUsers(){
	
	
	$DB = new PDO("mysql:host=127.0.0.1;dbname=CyberBlog", "root", "");
	$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sqlCmd = $DB->prepare("SELECT * FROM users");
	$sqlCmd->execute();
	$arr = array(); 

	while($row = $sqlCmd->fetch()){ 
		$user = array("id"=>$row["id"], "username"=>$row["username"],"email"=>$row["email"]);	
		array_push($arr,$user);	
	}
	header("content-type: application/json");
	echo json_encode($arr);
	
 }
 
   
 function getPostsByAuthor(){
	 	$data = $_POST["data"]; 		
	$author = $data["author"];	
	$DB = new PDO("mysql:host=127.0.0.1;dbname=CyberBlog", "root", "");
	$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sqlCmd = $DB->prepare("SELECT * FROM v_postswithauthorname where authorId = :author");
	$sqlCmd->execute(array(":author"=>$author));
	$arr = array(); 

	while($row = $sqlCmd->fetch()){ 
		$post= $row;	
		array_push($arr,$post);	
	}
	header("content-type: application/json");
	echo json_encode($arr);
 }
 
 
 
 
 
 ?> 





