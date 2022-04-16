<?php  
if($result = $conn->query("SELECT * FROM fixtures WHERE match_ID=$match_ID LIMIT 1")){
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            extract($row);
            
            $date = strtotime($date);
            $date = date("d M, Y",$date); //converts date milliseconds to string date
            $time = strtotime($time); //converts to time value if original value is text
            $time = date("H:i A",$time); // converts to string Hour:Minute time format
            $scores = " ";            
            
            //code below will display score or KO time
            if($status == 'live'){
                $scores = " 
                
                <div style='width:100%;text-align:center;font-weight:bold;color:white;padding:5px;'>
                    
                    <div id='home-goals' style='background-color:#2866f6;padding:2px'>
                        $home_goals
                    </div>

                    <div id='away-goals' style='background-color:#2866f6;padding:2px'>
                        $away_goals
                    </div>
                    
                    <span style='text-align:center;display:block;color:#2866f6;font-size:13px'>
                        &bull; live
                    </span>
                    
                </div>
                
                
                ";
            }
            elseif($status == 'upcoming'){
                $scores = " 
                
                <div style='width:100%;text-align:center;background-color:#b3b3b3c4;font-weight:bold;color:black;padding:5px;'>
                    $time
                </div>
                
                ";
                
            }
            elseif($status == 'report'){
                $scores = " 
                
                <div style='width:100%;text-align:center;font-weight:bold;color:black;padding:5px;'>
                    
                    <div id='home-goals'>
                        $home_goals
                    </div>

                    <div id='away-goals'>
                        $away_goals
                    </div>
                    
                    <span style='text-align:center;display:block;color:black;font-size:13px;'>
                        FT
                    </span>
                    
                </div>
                
                ";
                
                
            }
            elseif($status == 'played'){
                $scores = " 
                
                <div style='width:100%;text-align:center;font-weight:bold;color:black;padding:0px;'>
                    
                    <div id='home-goals'>
                        $home_goals
                    </div>

                    <div id='away-goals'>
                        $away_goals
                    </div>
                    
                    <span style='text-align:center;display:block;color:black;font-size:13px;'>
                        FT
                    </span>
                    
                </div>
                
                ";
                
            }
            else{
                $scores = " 
                
                <div style='width:100%;text-align:center;background-color:#b3b3b3c4;font-weight:bold;color:black;padding:5px;'>
                    Error:404
                </div>
                
                ";
                
            }

            echo"
            <div class='match_info'> 

            <h5>$league_name &bull; $date</h5>

            <div class='teams'>
            
            <div id='teams-block'> 
            
                <div id='home-team-bar'>
                    $home_team
                </div>
                
                <div id='score-bar'>
                    $scores  
                </div>
                
                <div id='away-team-bar'>
                    $away_team
                </div>  
                
            </div> <!-- #teams-block -->
            
            </div> <!-- .teams -->
            
            </div>  <!-- .match_info -->  
            
            ";
        }
    }
    else{
        echo "<div class='jumbotron'> <h3 class='text text-danger'>An error occured while retrieving match information: 2<h3> </div>";
    }

}
   else{
    echo "<div class='jumbotron'> <h3 class='text text-danger'>An error occured while retrieving match information: 3<h3> </div>";
}
        
?>