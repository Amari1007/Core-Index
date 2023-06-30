<?php
$host = "localhost"; 
$user = "admin"; 
$password = "abc123"; 
$database = "core"; //this could be optional later

@$conn = new mysqli($host,$user,$password,$database);
//Opens connection to Core database with $conn object

if($conn->connect_error){
  echo "<p style='{color:red}'> Database connection error!: $conn->connect_error </p>";
}

?>