<?php 
require_once("coreDB.php");

if(!isset($_GET['match_ID'])){ header("Location:../leagues.php");
exit();
}
else{
extract($_GET);  
}


if($result = $conn->query("SELECT * FROM `mw-tsl-fixtures` WHERE match_ID=$match_ID LIMIT 1")){
    if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        extract($row);
        
        if(isset($home_lineup) && $home_lineup!='' && !empty($home_lineup)){
            $homeplayername = explode(',', $home_lineup);
            
            //lays out div structure
            echo "<div id='home_lineup'> <h4>$home_team Starting XI</h4>";
            
            foreach($homeplayername as $x ){
                echo "<p>$x</p>";
            }
            
            echo "</div>"; //finishes div layout structure
        }else{
            echo "<div id='home_lineup' class='jumbotron'> <h3>Home starting XI is currently unavailable</h3> </div>";
        }
        
        
        if(isset($away_lineup) && $away_lineup!='' && !empty($away_lineup)){
             $awayplayername = explode(',', $away_lineup);
            
            //lays out div structure
            echo "<div id='away_lineup'> <h4>$away_team Starting XI</h4>";
            
            foreach($awayplayername as $x ){
                echo "<p>$x</p>";
            }
            
            echo "</div>
            ";
        }else{
            echo "<div id='away_lineup' class='jumbotron'> <h3>Away starting XI is currently unavailable</h3> </div>";
        }
        
    }

    }                
}

?>
