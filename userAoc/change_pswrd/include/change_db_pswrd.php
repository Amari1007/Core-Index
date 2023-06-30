<?php 
session_start();
require("coreDB.php");

function clean($_data){
	$data = trim($_data);
	$data = htmlspecialchars($_data);
	$data = stripslashes($_data);
	return $data;
}

$user_name = $_SESSION['user_name'];
$confirmed_pswrd = clean($_POST['cnfrm_pswrd']);

if($_SERVER['REQUEST_METHOD']=='POST'){
	$stmt = $conn->prepare(" UPDATE `users` SET `password` =? WHERE `user_id`=? ");
	$stmt->bind_param("si", $confirmed_pswrd, $_SESSION['user_id'] );
	$stmt->execute();
	$stmt->close();
	$conn->close();
	sleep(2);
	header('location: ../../../settings.php');
	exit();
}

?>