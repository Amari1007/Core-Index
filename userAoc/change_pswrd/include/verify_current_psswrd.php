<?php 
session_start();
require("coreDB.php");
$user_name = $_SESSION['user_name'];
$current_pswrd = $_POST['pswrd'];

if($_SERVER['REQUEST_METHOD']=='POST'){
	$stmt = $conn->prepare(" SELECT * FROM `users` WHERE `user_name`=? AND `password`=? ");
	$stmt->bind_param("ss", $_SESSION['user_name'],$_POST['pswrd']);
	$stmt->execute();
	
	$result = $stmt->get_result();
	$rows = $result->fetch_all(MYSQLI_ASSOC);
	if( count($rows)>0 ){
		$stmt->close();
		$conn->close();
		sleep(1);
		header("location:../c_psswrd.php");
		exit();
	}else{
		$stmt->close();
		$conn->close();
		sleep(1);
		header("location:../pswrd_uno.php?error=incorrect_password"); //redirect back
		exit();
	}
	
}
?>