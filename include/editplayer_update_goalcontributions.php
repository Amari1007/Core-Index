<?php

//this code will update player goals,assists, chances created in database
    
session_start();
require_once("coreDB.php");


    if($_SERVER['REQUEST_METHOD']==='POST'){
        extract($_POST);
        $id = (int)$id; //incase $id number was sent as text
        $goals = (int)$goals; //incase $id number was sent as text
        $assists = (int)$assists; //incase $id number was sent as text
    }
    else{
      header("Location:../editplayer.php?Status:_player_update_failed");  
    }

    if($conn->query("update players set goals=$goals, assists=$assists, chances_created=$chances_created where player_ID=$id ") === TRUE){
         echo "Goal Contributions Were Updated Successfully";
    }else{
         echo "Couldn't Update Player Goal Contributions ". $conn->error;
        }

         $conn->close();
?>