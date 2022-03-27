<?php

//this code will update player fname,lname,age,position,club,kit in databas
    
session_start();
require_once("coreDB.php");


    if($_SERVER['REQUEST_METHOD']==='POST'){
        extract($_POST);
        $id = (int)$id; //incase $id number was sent as text
    }
    else{
      header("Location:../editplayer.php?Status:_player_update_failed");  
    }

    if($conn->query("update players set fname='$fname', lname='$lname', age=$age, position='$position', kit='$kit' where player_ID=$id ") === TRUE){
         echo "Player Bio Update Was Successful";
    }else{
         echo "Couldn't Update ". $conn->error;
        }

         $conn->close();
?>