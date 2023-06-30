<?php
$host = "localhost"; 
$user = "admin"; 
$password = "abc123"; 
$database = "core"; //this could be optional later

@$conn = new mysqli($host,$user,$password,$database);

if($conn->connect_error){
	echo "<h2> <code>Sorry, an error occured while connecting to the database.</code></h2>";
	//$conn->close();
	exit();	
}

?>