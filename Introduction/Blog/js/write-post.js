var uId = sessionStorage.getItem("userId");
if(uId === undefined  || uId === null){
		window.location = "./index.html";
} 

$(document).ready(function(){
	var uId = sessionStorage.getItem("userId");
	 if( uId == undefined){
		 window.location="./index.html";
		 
	 }
	$('#btn_post_submit').click(createPost)
	
})

function createPost(){

if(!ClientSideValidation()){
	
	return;
}

	var author = sessionStorage.getItem("userId");
	var content= $('#inp_post_content').val();
	var img  = $('#inp_post_img').val();
	var title = $('#inp_post_title').val();
	
	var data = {"author":author,"content":content,"image":img,"title":title}
	var dataString ={"action":"createPost","data":data};

	$.ajax({
		url:"../logic/api.php",
		method :"POST",
		dataType:"json", 
		data:dataString,
		success:function(data){
			$("#p_info").attr('style','color:black');
			 var res ="Post created successfully, your post id is: "+data["id"] +"</br>";
			 res+= "You can view your post in the posts page";
			 $("#p_info").html(res);
			 clearInputs();
			 
		},
		error:function(err){
		$("#p_info").attr('style','color:red');
			$("#p_info").text("System has enountered an error trying to create the post");
			console.log(err.responseText);
		}
	});
}


function clearInputs(){
	$('#inp_post_content').val("");
	$('#inp_post_img').val("");
	$('#inp_post_title').val("");
}

function ClientSideValidation(){
	
	var content= $('#inp_post_content').val();
	var img  = $('#inp_post_img').val();
	var title = $('#inp_post_title').val();
	
	if (content.length ==0  ||img.length ==0 || title.length ==0){
		$("#p_info").attr('style','color:red');
		$("#p_info").text("All fields are mendatory");
		return false;
	}  
	
	return true;
	
	
	
	
	
}