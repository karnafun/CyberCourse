<?php


 
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login/Register CyberBank</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="./css/index.css">
</head>
<body>



<div id="loginMainContainer" class="login-page">
  <div class="form">
    <form class="register-form">
      <input type="text" placeholder="Username" id="r_username"/>
      <input type="password" placeholder="Password" id="r_password"/>
      <input type="PASSWORD" placeholder="Verify Password" id="r_v_password"/>
	  <p id="p_registerMessage"> </p>
      <button type="button"  id="btn_register" >Create Account</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p> 
    </form>
    <form class="login-form">
      <input type="text" placeholder="Username" id="l_username"/>
      <input type="password" placeholder="Password" id="l_password"/>
	  <p id="p_loginMessage"></p>
      <button id="btn_login" type="button">Login</button >
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>

 

<script> 
	$('.message a').click(function(){
	   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
	});

$(document).ready(function(e){


// LOGIN : 

	$('#btn_login').click(function(){

		   var l_username = $('#l_username').val();
		   var l_password= $('#l_password').val();	
			$.post("./api/login.php",
			{"l_username":l_username,"l_password":l_password},
			function(results) {		
				console.log(results);				
				if(results.status){
				 window.location="./pages/profile.php"
				}else{					
				$('#p_loginMessage').text(results.data)	
				}
			});
	});
		
	


//Register:
	$('#btn_register').click(function(){

	   var username = $('#r_username').val();
	   var password= $('#r_password').val();
	   var passwordVerify= $('#r_v_password').val();
	   
	   if(password !== passwordVerify){
			$('#p_registerMessage').text("Passwords don't match");
			return;
	   }
		
		$.post("./api/register.php",{"r_username":username,"r_password":password},
			function(results) {				
				if(results.status){
					$('#p_registerMessage').text(results.data)
					//window.location= "./pages/profile.php";
				}else{
					$('#p_registerMessage').text(results.data);
				}
		});
		

	});

})
</script>


</body>
</html>
