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
    <li class="nav-item active">
      <a class="nav-link" href="./profile.php">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./transfer.php">Transfer</a>
    </li>
    <li class="nav-item">
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
	<div class="col-sm-6 offset-sm-3">
		<h1 class="text-center">Elad is a hotdog page </h1>	
		
		<div  class="col-sm-4 offset-sm-4">
			 <form class="login-form">
			 <h4>     </h4>
			 
			
			 
			 <div class="form-group"> 
			  <label for="t_receiver">Receiver:</label>
				  <input class="form-control" type="text" placeholder="Receiver" id="t_receiver" />
			</div>
			 <div class="form-group"> 
			 <label for="t_amount">Amount:</label>
				  <input class="form-control" type="number" placeholder="Amount" id="t_amount"  	/>
			</div>			 
			   <p id="p_transferMessage"></p>  
				  <button id="btn_transfer" class="btn btn-success btn-block" type="button">Transfer Money</button >				 
			</form>
		</div> 
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
			$('#btn_transfer').click(function() {
			
				var amount = $('#t_amount').val();
				var receiver = $('#t_receiver').val();
				$.post('../api/transfer.php',
				{"t_amount":amount,"t_receiver":receiver},
				function(results){
					console.log(results);
						$('#p_transferMessage').html('<b>'+results.data+'</b>');																			
				})
			}); 			
		});
	
	
	</script>
	
</body>
</html>