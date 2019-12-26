
<html> 
<head> 
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<h1 > Generic Headline  </h1> 
	<p> This is a p with additional information  </p>
		
		
		<div> 
		<h4> Get User  </h4>
			<input type="text" placeholder="username" style="width:250px" id="inp_getUser_username" />
			<input type="text" placeholder="password" style="width:250px"  id="inp_getUser_password"  />
			<button id="btn_getUser"> Get User  </button>
		</div>
	
	<script> 
	$(document).ready(function(){
		$('#btn_getUser').click(function(e){
			
			var username = $('#inp_getUser_username').val();
			var password= $('#inp_getUser_password').val();
			//console.log("username : "+username+ ", password: "+password);
			
			var data = {"username":username, "password":password};
			var resultString =  {"action":"login","data":data};
			$.post('./api.php',
			resultString,
			function(data){
				
				console.log(data);					
			})
		})
	})
	
	</script> 
</body>
</html> 