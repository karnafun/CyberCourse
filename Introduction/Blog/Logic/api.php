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
	case "getComments":
		getComments();
	break;
	case "addComment":
		addComment();
	break;
	case "changePassword":
		changePassword();
	break;
	case "changeUsername":
		changeUsername();
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
	

	$DB = new PDO("mysql:host=127.0.0.1;dbname=CyberBlog", "root", "");
	$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sqlCmd = $DB->prepare("SELECT * FROM users WHERE username=:username and password=:password");
	 $sqlCmd->execute(array(":username"=>$username,":password"=>$password)); 
header("content-type: application/json");
	if($sqlCmd->rowCount() >0){
		
			$res = $sqlCmd->fetch();
			$_SESSION["user"] = $username;
			$_SESSION["userId"] = $res["id"];
			$arr = array("username"=>$res["username"], "id"=>$res["id"]);
			echo json_encode($arr);
			
			//echo '{"username":"'.$res["username"].'", "password":"'.$res["password"].'"}';
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
	$sqlCmd = $DB->prepare("SELECT * FROM v_postswithauthorname WHERE id=:postId");
	$sqlCmd->execute(array(":postId"=>$postId)); 
 
	if($sqlCmd->rowCount() >0){ 
			$res = $sqlCmd->fetch();			
			header("content-type: application/json"); 			
			//$arr = array("id"=>$res["id"],"title"=>$res["title"],"content" =>$res["content"], "image"=>$res["image"],"author"=>$res["author"],"authorId"=>$res["authorId"]);
			echo json_encode($res);
			 
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
	$title= $data["title"];	 
	$image= $data["image"];	  
	$DB = new PDO("mysql:host=127.0.0.1;dbname=CyberBlog", "root", "");
	$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
	$sqlCmd = $DB->prepare("insert into posts values (null,:author,:title,:content,:image)");
	$sqlCmd->execute(array(":author"=>$author,":content"=>$content,":title"=>$title, ":image"=>$image)); 
	if($sqlCmd->rowCount() >0){							
	$sqlCmd = $DB->prepare("select * from v_postswithauthorname where authorId =  :author and content= :content order by id desc");
	$sqlCmd->execute(array(":author"=>$author,":content"=>$content)); 
	$res = $sqlCmd->fetch();
		header("content-type: application/json");   
		//echo $res;
		$resArray = array("id"=>$res["id"],"author"=>$res["author"],"content"=>$res["content"],"title"=>$res["title"], "image"=>$res["image"]);	
		echo json_encode($resArray);
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
	$sqlCmd = $DB->prepare("SELECT * FROM v_postswithauthorname where authorId = :author order by id desc");
	$sqlCmd->execute(array(":author"=>$author));
	$arr = array(); 

	while($row = $sqlCmd->fetch()){ 
		$post= $row;	
		array_push($arr,$post);	
	}
	header("content-type: application/json");
	echo json_encode($arr);
 }
 
 
 
 
 function getComments(){
	$data = $_POST["data"]; 		
	$postId = $data["postId"];	
	$DB = new PDO("mysql:host=127.0.0.1;dbname=CyberBlog", "root", "");
	$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sqlCmd = $DB->prepare("SELECT * FROM v_comments where postId= :postId order by commentId asc ");
	$sqlCmd->execute(array(":postId"=>$postId));
	$arr = array(); 

	while($row = $sqlCmd->fetch()){ 	
		array_push($arr,$row);	
	}
	header("content-type: application/json");
	echo json_encode($arr);
 } 
 
 function addComment(){
	$data = $_POST["data"]; 		
	$postId = $data["postId"];
	$authorId = $data["authorId"];
	$title = $data["title"];
	$content= $data["content"];
	$DB = new PDO("mysql:host=127.0.0.1;dbname=CyberBlog", "root", "");
	$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sqlCmd = $DB->prepare("insert into comments values (null,:postId,:authorId,:title,:content)");
	$sqlCmd->execute(array(":postId"=>$postId,":authorId"=>$authorId,":title"=>$title,":content"=>$content));
	if ($sqlCmd->rowcount() >0 ){
		$sqlCmd = $DB->prepare("select * from v_comments where postId=:postId and authorId=:authorId and title=:title and content=:content");
		$sqlCmd->execute(array(":postId"=>$postId,":authorId"=>$authorId,":title"=>$title,":content"=>$content));
		$row =  $sqlCmd->fetch();
		header("content-type: application/json");
		echo json_encode($row);
	}else {
		echo 'No results ' ;
	}

 }
 
 function changePassword(){
	$data = $_POST["data"]; 		
	$password_old= $data["password_old"];
	$password_new = $data["password_new"];
	
	$DB = new PDO("mysql:host=127.0.0.1;dbname=CyberBlog", "root", "");
	$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
	$sqlCmd = $DB->prepare("select * from users where id = :id and username = :username and password = :password");
	$sqlCmd->execute(array(":id"=>$_SESSION["userId"],":username"=>$_SESSION["user"],":password"=>$password_old));
	if ($sqlCmd->rowCount() > 0){
		$sqlCmd = $DB->prepare("update users set password=:password where id = :id and username = :username ");
		$sqlCmd->execute(array(":id"=>$_SESSION["userId"],":username"=>$_SESSION["user"],":password"=>$password_new));
		echo 'password updated successfully';
	}else {
		 echo 'password incorrect'; 
	}
 }
 
 
 function changeUsername(){
	$data = $_POST["data"]; 		
	$username_new= $data["username_new"];	 
	
	$DB = new PDO("mysql:host=127.0.0.1;dbname=CyberBlog", "root", "");
	$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
	$sqlCmd = $DB->prepare("update users set username = :username where id = :id");
	$sqlCmd->execute(array(":id"=>$_SESSION["userId"],":username"=>$username_new));
	$sqlCmd = $DB->prepare("select username from users where id = :id");
	$sqlCmd->execute(array(":id"=>$_SESSION["userId"]));
	$row = $sqlCmd->fetch();
	if($row["username"] == $username_new){
		echo 'username updated successfully';
	} else {
		echo "error, username was not changed.";
	}
 }
 
 
 ?> 





