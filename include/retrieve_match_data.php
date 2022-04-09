<?php   
if($result = $conn->query("SELECT * FROM fixtures WHERE match_ID=$match_ID LIMIT 1")){
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            extract($row);
            $date = strtotime($date); //converts date(string) in DB to real date;

        //code below gets home and away club badges
        if($get_home_pic = $conn->query("SELECT club_pic FROM `clubs` WHERE club_name='$home_team' LIMIT 1")){
        if($get_home_pic->num_rows > 0){
        while($set_home_pic = $get_home_pic->fetch_assoc()){
            $home_pic = $set_home_pic['club_pic'];

        if($get_away_pic = $conn->query("SELECT club_pic FROM `clubs` WHERE club_name='$away_team' LIMIT 1")){
        if($get_away_pic->num_rows > 0){
        while($set_away_pic = $get_away_pic->fetch_assoc()){
           $away_pic = $set_away_pic['club_pic'];
        }
        }else{$away_pic='';}
        }else{$away_pic='';}


        }
    }else{$home_pic='';$away_pic='';}
}else{$home_pic='';$away_pic='';}


            //code below will decide $minutes_played output

            if($minutes_played==''||$minutes_played==null||empty($minutes_played)||!isset($minutes_played) ){
                $minutes_played='';
            }
            else if($minutes_played=='FT'||$minutes_played=='HT'){
                $minutes_played = "<p id='minutes_played'>$minutes_played</p> ";
            }
            else{
                $minutes_played='';
            }


            echo"
            <div class='match_info'> 

            <h5>$league_name &bull; ". 
                date("l d M Y",$date)."</h5>

            <div class='teams'>

            <div class='home_team'>
            $home_team
            <span class='home_scorers'>$home_scorers</span>
            </div>

            <div class='score'> 
            <span class='home_goals'>".($status=='not-played'? '-':$home_goals)."</span>
            <span class='away_goals'>".($status=='not-played'? '-':$away_goals)."</span>"
            .($status=='not-played'? ' ':$minutes_played)."                    
            </div>

            <div class='away_team'> 
            $away_team
            <span class='away_scorers'>$away_scorers </span>
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