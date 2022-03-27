<?php

//this code will update player weight,height in database
    
session_start();
require_once("coreDB.php");

    if($_SERVER['REQUEST_METHOD']==='POST'){
        extract($_POST);
        $id = (int)$id; //incase $id number was sent as text
        $weight = (int)$weight; //incase $id number was sent as text
        $height = (int)$height; //incase $id number was sent as text
    }
    else{
      header("Location:../editplayer.php?Status:_player_update_failed");  
    }

    if($conn->query("update players set weight='$weight', height='$height' where player_ID=$id ") === TRUE){
         echo "Player Physical Attributes Were Updated Successfully";
    }else{
         echo "Couldn't Update Player Physical Attributes ". $conn->error;
        }

         $conn->close();
?>