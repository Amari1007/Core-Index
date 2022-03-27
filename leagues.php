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
    
    <body>
    
    <?php require_once("include/header.php") ?>
    
    
    <main class="container">    
        <div class="row">
            
            <div class="col-sm-6"> 
                <h3>Africa</h3>
                <?php 
                    if($result = $conn->query("SELECT * FROM `leagues` WHERE continent='Africa' ")){
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
            <div class="col-sm-6"> 
                <h3>Europe</h3>
                <table class="table table-hover">
                    <tr><td>English Premier League</td></tr>                
                    <tr><td>UEFA Champions League</td></tr>                
                </table>
            
            </div>        
        </div>
        
    </main>
    
   <?php include_once("include/footer.php"); ?>
    
</body>    
</html>