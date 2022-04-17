<?php
session_start();

require_once("include/coreDB.php");

if($result = $conn->query("SELECT * FROM `leagues` WHERE 1 ")){
    if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        extract($row);
    }

    }                
}

?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once("include/headCode.php") ;?>    
    <head>
        <script>
            document.title = "Competitions & Tournaments";
        </script>
    
    </head>
    
    <body>
    
    <?php require_once("include/header.php") ?>
    
    
    <main class="container">    
        <div class="row">
            
            <div class="col-sm-6"> 
                <h3>Malawi</h3>
                <?php 
                    if($result = $conn->query("SELECT * FROM `competitions_tournaments` WHERE country='Malawi' limit 1")){
                    if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                    extract($row);
                    echo "        
                          <p> 
                          <a href='league_selected.php?league_id=$league_id&code=$code&league_name=$name'>
                          <img src='$logo' width='150'>
                          $name
                          </a> 
                          </p>
                        ";
                    }

                    } else{
                       echo "No Data" ;
                    }               
                    }                
                ?>
            
            </div>
            
            <!--<div class="col-sm-6">
                <h3>Cup Competitions</h3>
                <p>                    
                    <a href="#">
                        <img src="Media/Leagues/airteltop8.png" width="70" class="img-rounded">
                        Airtel Top 8
                    </a>                    
                </p>            
            </div>-->
            
        </div>
        
    </main>
    
   <?php include_once("include/footer.php"); ?>
    
</body>    
</html>