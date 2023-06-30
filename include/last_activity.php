<?php 
if( !session_id() ){ //start session if session hasn't started
	session_start();
}

$last_act= $_SESSION['last_activity'];
$displaced =  time()-$_SESSION['last_activity'];
if( isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ){//check if user is logged in first
	//if time elapsed between using webpage is >=60 minutes
	if( isset($_SESSION['last_activity']) && time()-$_SESSION['last_activity'] >= 3600*1 ){
		session_unset();
		session_destroy();
		if(isset($conn)){ //close database connection if open
			$conn->close();	
		}		
		header("location: sign_in.php?session_expired&displaced=".$displaced."&last_activity=".$last_act);
		exit();	
	}else{
		$_SESSION['last_activity'] = time(); //UPDATE SESSION DATE
	}
	
}
?>