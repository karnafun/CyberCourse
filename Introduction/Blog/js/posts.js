
var apiUrl = "../logic/api.php"
$(document).ready(function(){
	InitPage();     
	
	$('#btn_searchPost').click(searchPosts)
}); 

 function InitPage(){
	var uId = sessionStorage.getItem("userId");
	getPostsByAuthor(uId);
	
	var selectElement = $('#select_users');
	PopulateSelectWithAuthors(selectElement);
 }
 
 
 function searchPosts(){
	 var searchId = $('#select_users').children("option:selected").val();
	 getPostsByAuthor(searchId); 
 } 
 function getPostsByAuthor(authorId){
	 
	var data = {"author":authorId}
	var dataString = {"action":"getPostsByAuthor","data":data}
	
	$.ajax({
		method:"POST",
		url:apiUrl,
		data :dataString,
		success:function(results){	
	$(".blogPosts").html(" ");

				if(results.length ==0 ){
					var string = "<h3> No Posts found for current user </h3>";
					$(".blogPosts").append(string);
				}
			 $(results).each(function(i,d){
				 console.log(d);
				//Cut content into as summery 
				var numberOfWords = 30;
				var cutAt  =d["content"].split(' ', numberOfWords ).join(' ').length;
				var summery = d["content"];
				if	(summery.length > 50){
						summery  = d["content"].substr(0,cutAt)+"...";
				} 
				
				   
				var string = ` <div class="card mb-4">
									<img class="card-img-top" src=`+d["image"]+`  alt="Card image cap">
									<div class="card-body">
									<h2 class="card-title">`+d["title"]+`</h2>
									<p class="card-text">  `+summery+` </p>
									<a href="./fullpost.html?id=`+d["id"]+`" class="btn btn-primary">Read More &rarr;</a>
									</div>
									<div class="card-footer text-muted">
										Written by `+d["author"]+`
										
									</div>					
								</div>`				
				$(".blogPosts").append(string); 							
			 })
		}		
	});
 }
 
 
  
 function PopulateSelectWithAuthors(selectElement){
	  dataString={"action":"getAllUsers"};
	  
	  
	 	$.ajax({
			url:"../logic/api.php",
			method :"get",
			dataType:"json",
			data:dataString,
			success:function(data){
					$(data).each(function(index,_data){
						$(selectElement).append(new Option(_data["username"],_data["id"]));
						//$('#inp_getPostsByAuthor_author').append(new Option(_data["username"],_data["id"]));
					}) 
			},
			error:function(err){
				console.log("ERROR! " );
				console.log(err.responseText);  
			}
		});
 }
 
 
 //eof