
<html> 
<head> 
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="./functions.js"></script>
</head>
<body>
<div class="container"> 
	
	<div>
	<h1 > Generic Headline  </h1> 
	<p> This is a p with additional information  </p>
		
		
		<div id="section_login" class="section row" > 	
			<span class="col-sm-12 inf">Login: </span>
			<input class="col-sm-5" type="text" placeholder="username"  id="inp_getUser_username" />
			<input class="col-sm-5" type="text" placeholder="password"   id="inp_getUser_password"  />
			<button class="col-sm-2"  id="btn_getUser"> Get User  </button>			
			<div class="col-sm-12 res"> </div>
		</div> 
	
	<hr>
		<div id="section_register" class="section row" > 	
		<span class="col-sm-12 inf">Register: </span>
			<input class="col-sm-3" type="text" placeholder="username"  id="inp_registerUser_username" />
			<input class="col-sm-3" type="text" placeholder="password"   id="inp_registerUser_password"  />
			<input class="col-sm-3" type="text" placeholder="verify password"   id="inp_registerUser_password_verify"  />
			<button class="col-sm-3"  id="btn_registerUser"> Register User  </button>			
			<div class="col-sm-12 res"> </div>
		</div> 
		
		<hr>
		<div id="section_GetPost" class="section row" > 	
		<span class="col-sm-3 inf">Get Post by id:</span>			
			<input class="col-sm-5" type="text" placeholder="post id"   id="inp_getPostById_postId"  />
			<button class="col-sm-3"  id="btn_postById"> Get Post by id  </button>			
			<div class="col-sm-12 res"> </div>
		</div> 
		<hr>
		<div id="section_CreatePost" class="section row" > 	
		<span class="col-sm-12 inf">Write new post:</span>			
			
			<select class="col-sm-3" type="text" placeholder="post author"   id="inp_createPost_author"  ></select>			
			<textarea placeholder="Enter post content here" class="col-sm-12"  id="inp_createPost_content" ></textarea>
			<button class="col-sm-3"  id="btn_createPost"> Create Post</button>			
			<div class="col-sm-12 res"> </div>
		</div> 
		
		
		<hr>
	
		
		<div id="section_GetPostsByAuthor" class="section row" > 	
			<span class="col-sm-12 inf">Get posts by author:</span>						
			<select class="col-sm-3" type="text" placeholder="post author"   id="inp_getPostsByAuthor_author" >	</select>					
			<button class="col-sm-3"  id="btn_getPostsByAuthor">Get Posts</button>								
			<div class="col-sm-12 res"> </div>
		</div> 
	
	<hr>

</div>
	
	<style>
.section{
	border-bottom:5px solid gray;
	margin-bottom:20px;
}
	</style>
	<script> 
	$(document).ready(function(){		 
		$.ajax({
			url:"../../logic/api.php",
			method :"get",
			dataType:"json",
			data:dataString,
			success:function(data){
					$(data).each(function(index,_data){
						$('#inp_createPost_author').append(new Option(_data["username"],_data["id"]));
						$('#inp_getPostsByAuthor_author').append(new Option(_data["username"],_data["id"]));
					}) 
			},
			error:function(err){
				console.log("ERROR! " );
				console.log(err.responseText);  
			}
		});
	})
	
	</script> 
</body>
</html> 