<?php 
include("coreDB.php");
session_start();
if( isset($_POST['submit'] ) ){
	print_r($_FILES)."<br/>";
	$pic_name = $_FILES['user_pic']['name'];
	$pic_size = $_FILES['user_pic']['size'];
	$error = $_FILES['user_pic']['error'];
	$pic_type = $_FILES['user_pic']['type'];
	$temp_des = $_FILES['user_pic']['tmp_name'];
	
	$getExt = explode(".",$pic_name); //this creates an array separated from "."
	$fileExt = strtolower(end($getExt) ); //get string from last index in array
	$allowedExt = ["jpg","png","jpeg"];
	
	if( in_array($fileExt,$allowedExt) ){ //check if file ext is allowed
		if($error === 0){ //check if there is no error
			if($pic_size<100000000){   //1,000,000 Bytes = 1MB
				$newFileName = uniqid("cor",true).".".$fileExt; //creates file with unique name taken from milliseconds
				$newFileDes = "profile_pics/".$newFileName;
				if(move_uploaded_file($temp_des,$newFileDes) ){ //if file saved keep location in database
					$stat = $conn->prepare(" UPDATE `users` SET `user_pic` = ? WHERE `users`.`user_id` = ? ");
					$stat->bind_param("si",$newFileDes,$_SESSION['user_id']);
					if($stat->execute() ){
						echo "<br/> <p style='color:green'> File saved to database!! </p>";
					}
					$stat->close();
					$conn->close();
					header("Location: ../index.php?msg=successfully_saved_pic");
					exit();
					
				}else{
					echo "<br/> <p style='color:red'> Error: Failed to upload file </p>";
				}
				
			}else{
				echo "<br/> <p style='color:red'> Error: Picture is too big </p>";
			}
					
		}else{
			echo " <br/> <p style='color:red'> Error: A fatal error occured </p>";
		}
	
	}else{
		echo " <br/> <p style='color:red'> Error: File ext isnt allowed </p>";
	}
	
}


?>