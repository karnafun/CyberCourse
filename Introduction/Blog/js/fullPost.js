apiUrl = "../logic/api.php" ;
postId= getUrlParameter("id");
$(document).ready(function(){	
	 getPostById()
	 getComments();
	 $('#btn_post_submit').click(addComment)
})

 function getPostById(){
	 
	var data = {"postId":postId}
	var dataString = {"action":"getPostById","data":data}
	
		$.ajax({
			method:"POST",
			url:apiUrl,
			data :dataString,
			success:function(results){	
				$('#post_author').text("Written by: " +results["author"]);
				$('#post_title').text(results["title"]);				
				$('#post_img').attr('src',results["image"]);				
				$('#post_content').text(results["content"]);				
			}
		})
}		



  function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};



function getComments(){
	var data = {"postId":postId}
	var dataString = {"action":"getComments","data":data}
	
		$.ajax({
			method:"POST",
			url:apiUrl,
			data :dataString,
			success:function(results){	
			$('.comments').html(' ');
				$(results).each(function(index,data){
					var title = data["title"];
					var content= data["content"];
					var author= data["author"];
					var id= data["authorId"];
					
					var resultString = `
					<div class="comment ">				
						<p class="comment_title"> `+title+` <span class="comment_user" > `+author+` </span> </p>				
						<p class="comment_content"> `+content+` id: `+id+`</p> 
					</div> 
										`
					$('.comments').append(resultString)
					
				});
			}
		})
	
}




function addComment (){
	
	var title= $('#inp_comment_title').val();
	var authorId=sessionStorage.getItem("userId"); 
	var content =$('#inp_comment_content').val();	 	
	var data = {"postId":postId,"title":title,"authorId":authorId,"content":content}
	var dataString = {"action":"addComment","data":data}
	
		$.ajax({ 
			method:"POST",
			url:apiUrl,
			data :dataString,
			success:function(results){	
			
				if(results["commentId"]){
					getComments();
				}
			}
		})
	
}

