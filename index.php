<?php
session_start();
require_once("include/coreDB.php");

if( isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ){
	//IF USER IS LOGGED IN UPDATE SESSION
    require("include/last_activity.php"); //will redirect if session expires
}
?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once("include/headCode.php") ;?>    
    <head>
        <link rel="stylesheet" type="text/css" href="css/indexphp/style.css"/>
    </head>

    <body>    
    <?php require_once("include/header.php") ?>
    
    <p id="display"></p>
    
    <main class="container-fluid">
                
        <div id="player_list" class="table-responsive">      
            <h3>SHOWING RECENTLY ADDED PLAYERS (1-20)* </h3>
            
            <?php 
                include_once("include/player_list.php");
            ?>
            
        </div>

    </main>
    
   <?php include_once("include/footer.php"); ?>    

    </body>
	
	<script>
	//use keydown event to update session duration
		/*$('document').ready(function(){
			$.post("include/error_box.php",
					{error:1},
					function(data,status,obj){ 
						$('body').prepend(data);
						$('body').css({"pointer-events":"none"});
						$('#error_box').css({"pointer-events":"auto"});
					});
		});*/
	</script>
    
</html>