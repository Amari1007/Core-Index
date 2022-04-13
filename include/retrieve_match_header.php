<?php   
if($result = $conn->query("SELECT * FROM fixtures WHERE match_ID=$match_ID LIMIT 1")){
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            extract($row);
            
            $date = strtotime($date);
            $date = date("d M, Y",$date); //converts date milliseconds to string date
            $time = strtotime($time); //converts to time value if original value is text
            $time = date("H:i",$time); // converts to string Hour:Minute time format
            $scores = " ";
            
            //code below will display score or KO time
            if($status == 'live'){
                $scores = " 
                
                <div class='home_goals'>
                    $home_goals
                </div>
                
                <div class='away_goals'>
                    $away_goals
                </div>
                
                ";
            }
            elseif($status == 'upcoming'){
                $scores = " 
                
                <div style='float:left;width:100%;text-align:center;background-color:#ffd230;font-weight:bold;color:black;padding:3px;'>
                    $time
                </div>
                
                ";
                
            }
            elseif($status == 'report'){
                
            }
            elseif($status == 'played'){
                
            }

            echo"
            <div class='match_info'> 

            <h5>$league_name &bull; $date</h5>

            <div class='teams'>

            <div class='home_team'>
            $home_team
            <span class='home_scorers'>$home_scorers</span>
            </div>

            <div class='score'> 
                $scores
            </div>

            <div class='away_team'> 
            $away_team
            <span class='away_scorers'>$away_scorers </span>
            </div>
            
            <div id='vote-block-1'>
            <h3> Who will win?</h3>
            
               <div style='max-width:100%;margin:0px auto;min-height:50px;padding:5px;border:0px solid black'>
                
                    <div class='btn btn-success' id='home-vote'>Home</div>
                    <div class='btn btn-basic' id='draw-vote'>Draw</div>
                    <div class='btn btn-primary' id='away-vote'>Away</div>
                    
                </div>
                
            </div>
            
            </div>
            
            </div>                    

            <div class='match_facts'>

            <div id='match_facts_headers'>                    
            <div style='border-right:1px solid lightgrey;' id='match_stats' title='See team stats'>
                Match Stats                
            </div>

            <div id='line_ups' title='See team match day squads'>
                Line-Ups
            </div>                    
            </div> <!--#match_facts_headers-->

            </div> <!--.match_facts-->  

            </div> <!--.match_info-->

            ";
        }
    }
    else{
        echo "Error 2";
    }

}
   else{
    echo "<div class='jumbotron'> <h3 class='text text-danger'>An error occured while retrieving match information!<h3> </div>";
}
        
?>