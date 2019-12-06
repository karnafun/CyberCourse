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
		<h1 class="text-center">Profile Page</h1>	
		
		<div id="div_changePassword" class="col-sm-5">
			 <form class="login-form">
			 <h4> Change Password: </h4>
			 
			
			 
			 <div class="form-group"> 
				  <input class="form-control" type="text" placeholder="Old Password" id="c_o_password"/>
			</div>
			 <div class="form-group"> 
				  <input class="form-control" type="password" placeholder="New Password" id="c_n_password"  />
			</div>
			 <div class="form-group"> 	  
				  <input class="form-control" type="password" placeholder="Verify New Password" id="c_v_password"  />				 
			  </div> 
			   <p id="p_changePasswordMessage"></p>  
				  <button id="btn_changePassword" class="btn btn-success btn-block" type="button">Change Password</button >				 
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
			$('#btn_changePassword').click(function() {
				var oldPass = $('#c_o_password').val();
				var newPass= $('#c_n_password').val();
				var newPassVerify= $('#c_v_password').val();
				
				if(newPass !== newPassVerify){
					$('#p_changePasswordMessage').text("Passwords don't match");
					return;
			   }
			   
			  
			   $.post('../api/changePassword.php',
			   {"password_old":oldPass,"password_new":newPass},
			   function(results){
				   console.log(results);
			   })
			   
			})
		});
	
	
	</script>
	
</body>
</html>