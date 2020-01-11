	 uId = sessionStorage.getItem("userId");
	if(uId === undefined  || uId === null){
			window.location = "./index.html";
	}



var apiUrl = "../logic/api.php";
$(document).ready(function(){
	 $('#btn_changePassword_submit').click(changePassword)

	
}); 


function changePassword(){
	
	var pass_old = $('#inp_password_old').val();
	var pass_new = $('#inp_password_new').val();
	var pass_confirm= $('#inp_password_confirm').val();
	
	if( pass_new!== pass_confirm ){
		 alert("Dibil blat ! passwords don't match");		
		 return;
	} 
	
		var dataArray = {"password_old":pass_old, "password_new":pass_new,"password_confirm":pass_confirm}; 
		var data = {"action":"changePassword", "data":dataArray };
	
	$.post({
		url:apiUrl,
		data:data,
		success: function(results){
				$('#err_submit').text(results);
		} 
	})
	//console.log(pass_old);
} 