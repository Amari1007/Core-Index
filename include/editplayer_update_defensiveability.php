<?php

//this code will update player passing,shooting,dribbling in database
    
session_start();
require_once("coreDB.php");

    if($_SERVER['REQUEST_METHOD']==='POST'){
        extract($_POST);
        $id = (int)$id; //incase $id number was sent as text
    }
    else{
      header("Location:../editplayer.php?Status:_player_update_failed");  
    }

    if($conn->query("update players set tackle_attempt=$tackle_attempt, tackle_comp=$tackle_comp, aerials_contested=$aerials_contested, aerials_won=$aerials_won, interceptions=$interceptions, clean_sheets=$clean_sheets where player_ID=$id") === TRUE){
         echo "Player Defensive Ability Updated";
    }else{
         echo "Couldn't Update". $conn->error;
        }

         $conn->close();
?>
