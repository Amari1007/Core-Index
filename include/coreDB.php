<?php
 
@$conn = new mysqli("localhost","Admin","123abc","core");
//Opens connection to Core database with $conn object

if($conn->connect_error){
  echo "<p style='{color:red}'> Database connection error!: $conn->connect_error </p>";
}

?>