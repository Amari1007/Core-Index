<?php 

if( !session_id() ){ //start session if session hasn't started
	session_start();
}

require("coreDB.php");

if( isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ){//check if user is logged in first
	extract($_POST);
	$current_name = $_SESSION['user_name'];
	
	if($result = $conn->query("UPDATE `users` SET `user_name`=\"$confirmed_name\" WHERE user_name=\"$current_name\" ") ){
		$_SESSION['user_name'] = $confirmed_name;
		$conn->close();
		header("location: ../../settings.php ");
		exit();
	}else{
		$conn->close();
		echo "<h3 style='color:red; font-family:verdana'> A Critical error occured <a href='../../settings.php'>Click here to redirect to settings</a> </h3>";
	}
	
	
}else{
	$conn->close();
	session_unset();
	session_destroy();
	header("location: ../../sign_in.php");
	exit();
}
	
?>