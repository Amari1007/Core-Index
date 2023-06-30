<?php 
session_start();
require("coreDB.php");

if($_SERVER['REQUEST_METHOD']=='GET'){
	$data = $_GET['data'];
	if($result = $conn->query("SELECT * FROM users WHERE `user_name`= \"$data\" ") ){
		if($result->num_rows > 0){
			echo 1;
		}else{
			echo 2;
		}	
	}else{
		echo  3;
	}
	
}else{
	echo 4;
}

?>