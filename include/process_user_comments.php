<?php 
session_start();
 // THIS FUNCTION CLEANS USER INPUT
function verify_info($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

session_unset();
session_destroy();

if( isset($_SESSION['user_id']) && isset($_SESSION['user_name']) && isset($_SESSION['user_type'])){
	require("coreDB.php"); //USE A TRY STATEMENT IF POSSIBLE
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		//IF OKAY SUBMIT USER COMMENT IN DATABASE
		if( isset($_POST['user_comment']) ){
			$responsedb=Null;
			$event_id = (int)$_POST['match_ID']; //REMOVE LATER
			$user_id = (int)$_SESSION['user_id'];
			$user_name = (string) verify_info( $_SESSION['user_name'] ); //CLEAN INPUT
			$user_comment = (string)$_POST['user_comment'];
			$current_time = time();
			$comment_time = date("H:i:s",time());
			$comment_date = date("Y-m-d",time());
			$user_comment = $conn->real_escape_string($_POST['user_comment']); //ESCAPE SPECIAL CHARACTERS
			
			if($responsedb=$conn->query(" INSERT INTO user_comments(`event_id`,`user_id`,`user_name`,`comment_data`,`comment_time`,`comment_date`,`unix_time`)VALUES( {$event_id},{$user_id},'{$user_name}','{$user_comment}','{$comment_time}','{$comment_date}',{$current_time} ) ") ){
				//comment successfully added
				echo 1; //SIGNIFYING COMMENT SUCCESSFULLY ADDED
			}else{
				echo 2; //AN ERROR OCCURED IN THE DATABASE
			}
			
		}else{
			echo 3; // NO DATA RECEIVED
		}
		
	}else{
		echo 4;	// REQUEST_METHOD ERROR
	}
	
}else{
	echo 5;//FATAL ERROR USER ISNT LOGGED IN;
}

?>