<?php 	
require("include/coreDB.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width,initial-scale=1.0">						  
	<title>Core Test Page</title>	
</head>

<body>
	<div>
		<form>
			<label for="search_box">Search</label>
			<input type="search" placeholder="Type in a query..." id="search_box" onkeypress="">
			<input type="submit"> 
		</form>		
	</div>
</body>

	<script>
		function send_req2(){
			const xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if(this.readyState==4 && this.status==200){
					var x = this.responseText;
					alert("Server responded: "+x);
					//document.write(this.responseText);
				}
				
			}
			
			xhttp.open("GET","include/test.php",true);
			xhttp.send();			
		}
		
		send_req2();
	</script>

</html>
