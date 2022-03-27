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

    if($conn->query("update players set pass_comp=$pass_comp, pass_attempt=$pass_attempt, dribble_attempt=$dribble_attempt, dribble_comp=$dribble_comp, shots=$shots where player_ID=$id ") === TRUE){
         echo "Player Technical Ability Updated";
    }else{
         echo "Couldn't Update". $conn->error;
        }

         $conn->close();
?>
