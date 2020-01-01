$(document).ready(function(e){	
			$('#btn_getUser').click(login);	
			$('#btn_registerUser').click(register);
			$('#btn_postById').click(getpostById);
			$('#btn_createPost').click(createPost);
			$('#btn_getPostsByAuthor').click(getPostsByAuthor);
			
			 dataString={"action":"getAllUsers"};

			
}) 


function login(){				
			var username = $('#inp_getUser_username').val();
			var password= $('#inp_getUser_password').val();
			//console.log("username : "+username+ ", password: "+password);
			
			var data = {"username":username, "password":password};
			var resultString =  {"action":"login","data":data};
			$.post('./api.php',
			resultString,
			function(data){				
				var res ="";
				
				if(data["username"]){
					res = "Username: "+data["username"];
				}else{
					res =data;
				}
				$("#section_login").find('.res').text(res);
			})
}
  
function register(){				
			var username = $('#inp_registerUser_username').val();
			var password= $('#inp_registerUser_password').val(); 
			var password_verify= $('#inp_registerUser_password_verify').val();
			var res ="";
			//console.log("username : "+username+ ", password: "+password);			
			if (password_verify !== password){
				res ="passwords do not match";				
			}else if (!password || !username){
				res = "must fill all fields";
			}
			
			
			var data = {"username":username, "password":password};
			var resultString =  {"action":"register","data":data};
			$.post('./api.php',
			resultString,
			function(data){				
				
				if(data["username"]){
					res = "Username: "+data["username"]+" was registered successfully";
				}else{
					res =data;
				}
				console.log(res);
				$("#section_register").find('.res').text(res);
			})
			
			if (res){
				$("#section_register").find('.res').text(res);
			}
}

function getpostById(){

			var postId = $('#inp_getPostById_postId').val();
			var res ="";
			
			var data = {"postId":postId}    
			var resultString =  {"action":"getPostById","data":data};
			$.post('./api.php',
			resultString,
			function(data){			

				if(data["post"]){ 
					var post = data["post"];
					res = " Postid:"+post["id"] ;
					res += " Written by :"+post["author"] +"<br>";
					res+=post["content"];
				}else{
					res = "Couldn't find the post you were looking for";					  
				}
				$("#section_GetPost").find('.res').html(res);
				
			})
			
			
}

function createPost(){

	var author = $('#inp_createPost_author').children("option:selected").val();
	var content= $('#inp_createPost_content').val(); 
	var data = {"author":author,"content":content}
	var dataString ={"action":"createPost","data":data};

	$.ajax({
		url:"./api.php",
		method :"POST",
		dataType:"json",
		data:dataString,
		success:function(data){
			var res = "Post id: "+data["id"];
			res+= ", Author: "+data["author"] + "<br>";
			res+= data["content"];			
			$('#section_CreatePost').find(".res").html(res);
				console.log(data);
		},
		error:function(err){
			console.log(err.responseText);
		}
	});
}




function getPostsByAuthor(){

	var author = $('#inp_getPostsByAuthor_author').children("option:selected").val();	
	var data = {"author":author}
	var dataString ={"action":"getPostsByAuthor","data":data};
	
	$.ajax({
		url:"./api.php",
		method :"POST",
		dataType:"json",
		data:dataString,
		success:function(data){
				var res ="";
				$(data).each(function(i,d){
					var  id = d["id"];
					var author = d["author"];
					var content = d["content"];
					res += '<div style="border:2px solid black; padding-left:10px;">';
					res += "<p>post id: "+id+", post author: "+author+"</p>";
					res += "<p>"+content+"</p>";
					res+= "</div>";
				})
				$('#section_GetPostsByAuthor').find('.res').html(res);
		},
		error:function(err){
			console.log(err.responseText);
		}
	});
}






















