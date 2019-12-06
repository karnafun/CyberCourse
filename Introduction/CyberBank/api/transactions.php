<?php

session_start();

if (!isset($_SESSION["user"])){
	echo 'you do not belong here';	
	die();
}

$DB = new PDO("mysql:host=127.0.0.1;dbname=CyberBank", "root", "");
$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Check if user have enough money   	 
$sqlCmd = $DB->prepare("SELECT  * FROM transactions ");
$sqlCmd->execute();
 
$html ='';
foreach($sqlCmd->fetchall() as $row){
	$html.=	"<div  class='col-sm-4 offset-sm-4'><div class='transaction'> <p>From:<span class='_res'>".$row["sender"]." </span> </p><p>To: <span class='_res'>".$row["receiver"]."</span></p><p>Amount: <span class='_res'>".$row["amount"]."</span></p></div></div>";
}

header("Content-Type: application/json"); 
echo '{"status":true,"data":"'.$html.'"}';
//echo $html;
die();

	
 echo 'why are you here?';
 die();
?>
