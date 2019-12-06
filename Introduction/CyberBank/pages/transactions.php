<?php 
	session_start();
	
	
	if(!isset($_SESSION["user"])){
		die(header("Location: ../index.php"));
	}
?>
<!DOCTYPE html>
<html>
<head>
  <title>CyberBank Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/profile.css">
</head>
<body>	

<!--
Navbar 
 -->

<nav class="navbar navbar-expand-sm navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item ">
      <a class="nav-link" href="./profile.php">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./transfer.php">Transfer</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="./Transactions.php">Transactions</a>
    </li>
	<li class="nav-item"> 
		<a class="nav-link" href="#" id="btn_logout" >	Logout	</a> 
	</li>
  </ul>

</nav>

<!--
Navbar 
 -->

<div class="row"> 
	<div id="div_transcations" class="col-sm-6 offset-sm-3">
		
		
		
	</div>  
</div> 

		
	
	
	<script> 
	
		$(document).ready(function(){
				$('#btn_logout').click(function() {			
				$.get('../api/logout.php',
				function(data){
						window.location="../index.php";
				})
			}); 
			
			$.get('../api/transactions.php',
			function(results){				
				if(results.status){
					console.log(results.data);
					$('#div_transcations').html(results.data);
				}
			});
		});
	
	
	</script>
	
	
	<style> 
		.transaction{
			border-bottom: solid 10px green;
		}
		.transaction p{
			margin-top:0px;
			margin-bottom:0px;
			margin-right:10px;
			display:inline-block;
		}
		._res{
			font-weight:700;
		}
	</style> 
</body>
</html>