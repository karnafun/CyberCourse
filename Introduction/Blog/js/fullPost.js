apiUrl = "../logic/api.php" ;
$(document).ready(function(){
	   GetPost();

		var postId  = getUrlParameter("id");
	 getPostById(postId)
})

 function getPostById(postId){
	 
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

 
 
  

function GetPost(){
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