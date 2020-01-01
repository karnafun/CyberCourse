var apiUrl = "../logic/api.php"


$(document).ready(function(){
	$('#btn_login').click(login);	
	$('#btn_register').click(register);	
	$('#a_goto_register,#a_goto_login').click(toggleForms)
});  


function toggleForms(){
	login =$('#section_login');
	register  =$('#section_register');

	
	if ($(register).hasClass('d-none')){
		$(login).addClass('d-none');
		$(register).removeClass('d-none');
	}else {
			$(register).addClass('d-none');
			$(login).removeClass('d-none');
	}
	
}


function  register(){
		var username = $('#inp_register_username').val();
		var password = $('#inp_register_password').val();
		var verifyPassword = $('#inp_register_password_verify').val(); 
		var email = $('#inp_register_email').val();
		if(username.trim().length == 0){
			$('#err_register_username').text("Must choose a username");
			return;
		}
		if(email.trim().length == 0){
			$('#err_register_email').text("Must choose a email");
			return;
		}		
		if(password != verifyPassword){
			$('#err_register_password_verify').text("Passwords don't match");			
			return;
		}
	 
		var dataArray = {"username":username, "password":password,"email":email}; 
		var data = {"action":"register", "data":dataArray };
	 
		$.ajax({
			method:"POST",
			url:apiUrl,
			data:data,
			dataType:"json",
			success:function(results){
			
				if (results["message"]){
				$('#err_register').text(results["message"]);	
					return;
				 }else{
					$('#err_register').text(results["username"] +" was added successfully")
				 }

			},
			error:function(error){
				$('#err_login').text("An error has occurred, please try again")
			}
		})
} 
function login(){


		var username = $('#inp_login_username').val();
		var password = $('#inp_login_password').val();
		var dataArray = {"username":username, "password":password}; 
		var data = {"action":"login", "data":dataArray };

		$.ajax({
			method:"POST",
			url:apiUrl,
			data:data,
			dataType:"json",
			success:function(results){
			
				if (results["message"]){
				$('#err_login').text(results["message"]);	
					return;
				 }else{
					 //console.log(results);
					 sessionStorage.setItem("userId",results["id"])
					window.location = "./posts.html";
				 }

			},
			error:function(error){

				$('#err_login').text("An error has occurred, please try again")
			}
		})
	
}