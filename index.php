<?php
session_start();
require_once("include/coreDB.php");
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
            
            <?php 
                include_once("include/player_list.php");
            ?>
            
        </div>
        
    </main>
    
   <?php include_once("include/footer.php"); ?>    

    </body>
    
</html>