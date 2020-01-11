<?php 
session_start();
session_destroy();
?>
<html> 
	<body> 
		<script> 
			sessionStorage.clear();
			window.location= "./index.html";
		</script> 
	</body> 
</html> 