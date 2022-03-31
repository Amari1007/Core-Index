<?php 
require_once("include/coreDB.php");
extract($player_data);

//check if player_id is set
    if(!isset($player_data)){
        //return to index.php if no player was chosen i.e. playerid not set
        header("location:index.php?redirected:invalid_player_id");
    }  
/*****************************************************************************************/

$error= ''; //variable holding output text for use later


/******RETRIEVE DATA FROM PLAYER TABLE*********/
if($result = $conn->query("SELECT * FROM players WHERE player_id=$playerid LIMIT 1")){
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            extract($row);   
            $club_position = $row['position'];

            $player_info = "
            
 <table class='table table-hover' style='max-width:50%'>
        <caption> <h2 style='color:black'>$fname $lname ".(
                isset($_SESSION['user_id']) && $_SESSION['user_type'] === 'admin' && isset($_SESSION['user_name']) ?"<small>&bull; <a href='editplayer_view.php?playerid=$player_ID&club=$club&nationality=$nationality' title='Edit $fname $lname'>Edit Player?</a></small>":""
            
            )."</h2> </caption>
        
        <tr>		
            <td colspan='2' style='text-align:center;'><img src='$player_pic' width='130' onerror='player_imgerror(this)' alt='image N/A' title='$fname $lname'></td>		
        </tr>        
         <tr style='font-weight:bold; text-align:left'>
            <td>Club</td>
            <td> <a>$club</a> </td>		
        </tr>       
         <tr style='font-weight:bold; text-align:left'>
            <td>Nationality</td>
            <td>$nationality</td>		
        </tr>
         <tr>
            <td style='font-weight:bold'>Score</td>
            <td></td>		
        </tr>
         <tr style='font-weight:bold'>
            <td>Rating</td>
            <td></td>		
        </tr>

  </table> 
  
  <table class='table table-hover' style='margin:auto; max-width:50%'>
  <thead>
      <tr style='background-color:#333333; color:white'>
          <th>Position</th>
          <th>Age</th>
          <th>Foot</th>
          <th>Height</th>
          <th>Weight</th>
      </tr>
  </thead>
  <tbody> 
      <tr> 
          <td style='width:20%; font-weight:bold'>".(empty($position)?"N/A":"$position")."</td>
          <td style='width:20%; font-weight:bold'>".(empty($age)?"N/A":"$age")."</td>
          <td style='width:20%; font-weight:bold'>".(empty($dominant_foot)?"N/A":"$dominant_foot")."</td>
          <td style='width:20%; font-weight:bold'>".(empty($height)?"N/A":"$height Cm")."</td>
          <td style='width:20%; font-weight:bold'>".(empty($weight)?"N/A":"$weight Kg")."</td>
      </tr>
    </tbody>
  </table>
            
            ";
        }
    }else{
        $player_info = "No record in database";
    }
}else{
    $error = "Database server couldnt execute query";
}
/**********************************************/

/*********************RETRIEVE DATA FROM CLUB TABLE*************************/

if($result = $conn->query("SELECT * FROM clubs WHERE club_name LIKE '%$club_name%' LIMIT 1 ")){
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            extract($row);
            $club_info = "
            <table class='table table-hover' style='width:50%;margin:auto'>
                <caption> <h3 style='color:black'>$club_name</h3> </caption>
                <tr style='background-color:#d9481c;color:white;font-weight:bold'> 
                    <td rowspan='2' style='background:white;text-align:center;width:40%' title='$club_name'> 
                    <a href='clubview.php?clubid=$club_ID&club_name=$club_name'> <img src='$club_pic' onerror='team_imgerror(this)' width='100'> 
                    </a>
                    </td>
                    <td style='width:20%'>Position(s)</td>
                    <td style='width:20%'>Joined</td>
                    <td style='width:20%'>Kit</td>
                </tr>
                <tr style='font-weight:bold'> 
                    <td>$position</td>                
                    <td>$joined</td>                
                    <td>$kit</td>                
                </tr>
            </table>
            ";        
        }
        }
    }

/***********RETRIEVE DATA FOR NATIONAL TEAM***************/

if($result = $conn->query("SELECT * FROM national_team WHERE nation_name = '$nationality' LIMIT 1 ")){
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            extract($row);
            
            $nation_info = "
            <table class='table table-hover' onclick='replace_img(this)' style='width:50%'>
            <caption> <h3 style='color:black'>$nationality ($national_confederation)</h3> </caption>
            <tr style='background-color:#d9481c;color:white;font-weight:bold'>
            <td rowspan='2' style='text-align:center;width:40%;background:white'> <img id='nation_pic' src='$nation_pic' onerror='team_imgerror(this)' width='100' title='$nationality'> 
            </td>
            <td style='width:15%'>Position(s)</td>
            <td style='width:15%'>Apps</td>
            <td style='width:15%'>Debut</td>
            <td style='width:15%'>Goals</td>
            </tr>
            <tr style='font-weight:bold'> 
            <td>$national_position</td>
            <td>$national_caps</td>
            <td>$national_debut</td>
            <td>$national_goals</td>
            </tr>
            </table>  
            ";
            }
        }
    }


/**********RETRIEVE DATA FOR FIXTURES************/
 if($result2 = $conn->query("SELECT * FROM `clubs` WHERE club_name like'%$club_name%' limit 1")){
        if($result2->num_rows>0){
            while($clubdata = $result2->fetch_assoc()){
                extract($clubdata);
   if($result=$conn->query("SELECT * FROM `$league_code-fixtures` where home_team like'%$club_name%' or away_team like'%$club_name%' ORDER BY `date` DESC")){
    if($result->num_rows > 0){
        $fixture_list = null;
        $fixture_list = "<table class='table table-hover table-responsive' style='width:80%; border:0px solid black;margin:auto; margin-bottom:30px'>";
        
        while($row = $result->fetch_assoc()){
            extract($row);

            $date = strtotime($date);
            $time = strtotime($time); 
            $code = !isset($code)? "mw-tsl" :$code ;

            if($status=='played'){
                $match_link = "<a href='match_view.php?match_ID=$match_ID&code=$code&league_name=$league&fixtures=$code-fixtures'>$home_goals-$away_goals</a>";
            }
            else if($status=='not-played'){
                 $match_link = date("H:i",$time);
            }
            else if($status=='live'){
                $match_link = " $home_goals-$away_goals ";
            }
            else if($status=='pending'){
                $match_link = " $home_goals-$away_goals ";
            }
            else if($status=='disable'){
                $match_link = " $home_goals-$away_goals ";
            }
            else{
                $match_link = date("H:i",$time);
            }

            //code below creates a new table every time
            $fixture_list .= " 
            <tr>
            <td style='width:30%;font-size:14px;font-weight:bold;text-align:right'>".date('M d, Y',$date)."</td> 
            <td style='width:27%;text-align:right'>".($home_team=="$club_name"?"<b>$home_team</b>":"$home_team")."</td> 
            <td style='width:15%;text-align:center' title='See Match Details'>$match_link</td> 
            <td style='width:28%;text-align:left'>".($away_team=="$club_name"?"<b>$away_team</b>":"$away_team")."</td> 
            </tr>  
               
            ";  
            
    } 
        $fixture_list .= "</table>";
    } 
       else{
    $fixture_list = "<div class='jumbotron'> <h3>Fixtures Currently Unavailable 1</h3> </div>";
    }    
    }else{
       $fixture_list = "<div class='jumbotron'> <h3>Fixtures Currently Unavailable 2</h3> </div>";
   }
            }
        }else{
            $fixture_list = "<div class='jumbotron'><h3>Fixtures Currently Unavailable 3</h3> </div>";
        }
    }else{
            $fixture_list = "<div class='jumbotron'> <h3>Couldn't Execute Query</h3> </div>";
    }

/************************************************/

/***************GET STATS ACCORDING TO POSITION IN VIEW TABLE****************/

$player_stats = '';
$position_data = ''; //this variable holds output information

/******************IF POSITION IS MIDFIELDER**********************/
if($position=='CDM' || $position=='CM' || $position=='CAM' || $position=='LM' || $position=='RM'){
    if($result = $conn->query(" SELECT * FROM midfielders_rank WHERE player_ID=$player_ID LIMIT 1 ")){
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
            extract($row);

            $player_stats = " 
            <div class='row'>          
            <div class='col-sm-4'>
            <table class='table table-hover table-striped'>
            <tr><td>Minutes Played</td> <td> $minutes_played</td></tr>
            <tr><td>Goals</td> <td> $goals </td></tr>
            <tr><td>Assists</td> <td> $assists</td></tr>
            <tr><td>Chances Created</td> <td> $chances_created </td></tr>
            <tr><td>Shots</td> <td> $shots</td></tr>
            <tr><td>Dribbles Completed</td> <td> $dribble_comp </td></tr>
            <tr><td>Passes</td> <td> $pass_attempt </td></tr>
            <tr><td>Passes Completed</td> <td> $pass_comp</td></tr>
            <tr><td>Crosses Attempted</td> <td> $cross_attempt </td></tr>
            <tr><td>Possesion Recovery</td> <td> $possession_won </td></tr>
            <tr><td>Interceptions</td> <td> $interceptions</td></tr>
            <tr><td>Tackles</td> <td> $tackle_comp </td></tr>
            <tr> <td>G/A per 90</td> <td> </td> </tr>
            </table>
            </div>

            ";                
                
                if(!empty($pass_attempt) && !empty($pass_comp) ){
                        
            $position_data = "
                 
             <div class='col-sm-2' style='text-align:center'> 
              
              <h1 class='text-success' title='Average number of goals/assists every 90 minutes'>".round($minutes_played/($goals+$assists),2)."<small> Minutes per goal involvement </small>
              </h1>
              
              <h1 class='text-success' title='Average number of chances created every 90 minutes'>".round((90/$minutes_played)*$chances_created,2)."<small> Chances created per 90</small>
              </h1>
              
              <h1 class='text-success' title='Average shots at goal every 90 minutes'>".round((90/$minutes_played)*$shots,2)."<small> Shots per 90</small></h1>
             </div>
             
             
              <div class='col-sm-6'>
              <div class='pass_accuracy'>
              <script> 
                anychart.onDocumentReady(function(){
                
                var pass_accuracy = Math.ceil(($pass_comp/$pass_attempt)*100);
                var blank_space = 100-pass_accuracy;

                var shots = [
                {x:'Pass Completed', value:pass_accuracy, exploded:false},
                {x:'Misplaced Passes', value:blank_space},
                ];

                var chart = anychart.pie();

                chart.title('Pass Accuracy: '+pass_accuracy+'%');

                chart.data(shots);

                chart.container('pass_accuracy');

                chart.draw();

                chart.legend().position('right');

                chart.legend().itemsLayout('vertical');

                });
                </script>
                
                <div id='pass_accuracy' style='width:100%; height:100%' title=\"How Often $lname's Passes Find Team Mates\"> </div>
                
                </div>
                
                <div class='shot_conversion'>
                 <script> 
                anychart.onDocumentReady(function(){                
                var shot_accuracy = Math.ceil(($goals/$shots)*100);
                var missed = 100-shot_accuracy;

                var data = [
                {x:'Shots Converted', value:shot_accuracy, exploded:false},
                {x:'Missed Shots', value:missed},
                ];

                var chart = anychart.pie();

                chart.title('Shot Conversion Rate: '+shot_accuracy+'%');

                chart.data(data);

                chart.container('shot_conversion');

                chart.draw();

                chart.legend().position('right');

                chart.legend().itemsLayout('vertical');

                });
                </script>
                <div id='shot_conversion' style='width:100%; height:100%' title=\"How Often $lname's Shots Result Into Goals \"> </div>
                
                </div>
                
                <div class='dribble_succession'>
                 <script> 
                anychart.onDocumentReady(function(){                
                var dribble_succession = Math.ceil(($dribble_comp/$dribble_attempt)*100);
                var failed = 100-dribble_succession;

                var data = [
                {x:'Dribbles Completed', value:dribble_succession, exploded:false},
                {x:'Dribbles Failed', value:failed},
                ];

                var chart = anychart.pie();

                chart.title('Dribbling Success Rate: '+dribble_succession+'%');

                chart.data(data);

                chart.container('dribble_succession');

                chart.draw();

                chart.legend().position('right');

                chart.legend().itemsLayout('vertical');

                });
                </script>
                <div id='dribble_succession' style='width:100%; height:100%' title=\"$lname's Dribbling Success rate \"> </div>
                
                </div>
                    
                </div>
                
                    
         </div>";  
                    
                }else{
                    $position_data = " <div class='col-sm-7'> <div class='jumbotron'> <h3>No Further Details Available</h3> </div> </div> </div> ";
                }
                
            }
        }
        
    }else{
        echo "Query failed";
    } 
       
}

/******************IF POSITION IS FORWARD************************/
else if($position=='ST' || $position=='CF' || $position== 'LW' || $position=='RW'){
     if($result = $conn->query(" SELECT * FROM forwards_rank WHERE player_ID=$player_ID LIMIT 1 ")){
         if($result->num_rows>0){
             while($row = $result->fetch_assoc()){
                 extract($row); //for forwards, this will override above extract()
                 //if the player has 0 minutes_played, instead assign a number by multiplying by 85 mins
                 $minutes_played = ($minutes_played == 0 ? $appearances*85:$minutes_played*1);
                 $goals = (int)$goals;
                 $assists = (int)$assists;
                 
                //code below sets the initial div structure and content
                $player_stats = "
                <div class='row'>          
                <div class='col-sm-4'>
               
               <table class='table table-hover table-striped'>
                <tr><td>Appearances</td> <td> $appearances </td></tr>
                <tr><td>Minutes Played</td> <td> $minutes_played</td></tr>
                <tr><td>Goals</td> <td> $goals </td></tr>
                <tr><td>Assists</td> <td> $assists</td></tr>
                <tr><td>Chances Created</td> <td> $chances_created </td></tr>
                <tr><td>Shots</td> <td> $shots</td></tr>
                <tr><td>Dribbles Completed</td> <td> $dribble_comp </td></tr>
                <tr><td>Passes</td> <td> $pass_attempt </td></tr>
                <tr><td>Passes Completed</td> <td> $pass_comp</td></tr>
                <tr><td>Crosses Attempted</td> <td> $cross_attempt </td></tr>
                <tr><td>Possesion Recoveries</td> <td> $possession_won </td></tr>
                </table>
                
                </div>

                ";
                                  
                 if(!empty($minutes_played) && !empty($goals+$assists) && !empty($pass_attempt) && !empty($dribble_attempt) && !empty($dribble_attempt) ){
                     $position_data = "
                 
             <div class='col-sm-2' style='text-align:center'> 
              
              <h1 class='text-success' title='Average number of goals/assists every 90 minutes'>".round($minutes_played/($goals+$assists),2)."<small> Minutes per goal involvement </small>
              </h1>
              
              <h1 class='text-success' title='Average number of chances created every 90 minutes'>".round((90/$minutes_played)*$chances_created,2)."<small> Chances created per 90</small>
              </h1>
              
              <h1 class='text-success' title='Average shots at goal every 90 minutes'>".round((90/$minutes_played)*$shots,2)."<small> Shots per 90</small></h1>
             </div>
             
             
              <div class='col-sm-6'>
              <div class='pass_accuracy'>
              <script> 
                anychart.onDocumentReady(function(){
                
                var pass_accuracy = Math.ceil(($pass_comp/$pass_attempt)*100);
                var blank_space = 100-pass_accuracy;

                var shots = [
                {x:'Pass Completed', value:pass_accuracy, exploded:false},
                {x:'Misplaced Passes', value:blank_space},
                ];

                var chart = anychart.pie();

                chart.title('Pass Accuracy: '+pass_accuracy+'%');

                chart.data(shots);

                chart.container('pass_accuracy');

                chart.draw();

                chart.legend().position('right');

                chart.legend().itemsLayout('vertical');

                });
                </script>
                
                <div id='pass_accuracy' style='width:100%; height:100%' title=\"How Often $lname's Passes Find Team Mates\"> </div>
                
                </div>
                
                <div class='shot_conversion'>
                 <script> 
                anychart.onDocumentReady(function(){                
                var shot_accuracy = Math.ceil(($goals/$shots)*100);
                var missed = 100-shot_accuracy;

                var data = [
                {x:'Shots Converted', value:shot_accuracy, exploded:false},
                {x:'Missed Shots', value:missed},
                ];

                var chart = anychart.pie();

                chart.title('Shot Conversion Rate: '+shot_accuracy+'%');

                chart.data(data);

                chart.container('shot_conversion');

                chart.draw();

                chart.legend().position('right');

                chart.legend().itemsLayout('vertical');

                });
                </script>
                <div id='shot_conversion' style='width:100%; height:100%' title=\"How Often $lname's Shots Result Into Goals \"> </div>
                
                </div>
                
                <div class='dribble_succession'>
                 <script> 
                anychart.onDocumentReady(function(){                
                var dribble_succession = Math.ceil(($dribble_comp/$dribble_attempt)*100);
                var failed = 100-dribble_succession;

                var data = [
                {x:'Dribbles Completed', value:dribble_succession, exploded:false},
                {x:'Dribbles Failed', value:failed},
                ];

                var chart = anychart.pie();

                chart.title('Dribbling Success Rate: '+dribble_succession+'%');

                chart.data(data);

                chart.container('dribble_succession');

                chart.draw();

                chart.legend().position('right');

                chart.legend().itemsLayout('vertical');

                });
                </script>
                <div id='dribble_succession' style='width:100%; height:100%' title=\"$lname's Dribbling Success rate \"> </div>
                
                </div>
                    
                </div>
                
                    
         </div>  ";
                 }
                 else{
                     $position_data = " <div class='col-sm-8'> <div class='jumbotron'> <h3>No Further Details Available</h3> </div> </div> </div> ";
                 }
                 
                 
                 
             }
         }
     }
    
    }

/******************IF POSITION IS DEFENDER*******************/

/******************CENTER-BACKS****************************/
else if( $position=='CB'){
    if($result = $conn->query(" SELECT * FROM players WHERE player_ID=$player_ID LIMIT 1")){
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                extract($row); //for CB, this will override above extract()
                 //if the player has 0 minutes_played, instead assign number by multiplying by 85 mins
                 $minutes_played = ($minutes_played == 0 ? $appearances*85 : $minutes_played*1);
                
                //code below displays a defenders data in a table
                $player_stats = "
                   <div class='row'> 
                     <div class='col-sm-4'>
                        <table class='table table-hover table-striped'>
                        <tr><td>Appearances</td> <td> $appearances </td></tr>
                        <tr><td>Minutes Played</td> <td> $minutes_played</td></tr>
                        <tr><td>Clean Sheets</td> <td> $clean_sheets </td></tr>
                        <tr><td>Aerials Balls Won</td> <td> $aerials_won</td></tr>
                        <tr><td>Interceptions</td> <td> $interceptions </td></tr>
                        <tr><td>Tackles Won</td> <td> $tackle_comp</td></tr>
                        <tr><td>Possesion Recoveries</td> <td> $possession_won </td></tr>
                        <tr><td>Clearances</td> <td> $clearances </td></tr>
                        <tr><td>Blocks</td> <td> $blocks </td></tr>
                        <tr><td>Defensive Errors</td> <td> $defensive_errors </td></tr>
                        <tr><td>Passes Attempted</td> <td> $pass_attempt </td></tr>
                        <tr><td>Passes Completed</td> <td> $pass_comp</td></tr>
                        </table>
                    </div>
                ";
                
                 if(!empty($pass_attempt) && !empty($pass_comp) && !empty($minutes_played) ){
                        
            $position_data = "
                 
             <div class='col-sm-3' style='text-align:center'> 
              
              <h1 class='text-danger' title='Errors leading to shots per 90 minutes'>".round((90/$minutes_played)*$defensive_errors,2)."<small> Defensive errors per 90 </small>
              </h1>
              
              <h1 class='text-success' title='Average number of aerial balls won every 90 minutes'>".round((90/$minutes_played)*$aerials_won,2)."<small> Aerial balls won per 90 </small>
              </h1>
               
              <h1 class='text-success' title='Average number of possession recoveries every 90 minutes'>".round((90/$minutes_played)*$possession_won,2)."<small> Ball recoveries won per 90 </small>
              </h1>
              
              <h1 class='text-success' title='Average number of clearances every 90 minutes'>".round((90/$minutes_played)*$clearances,2)."<small> Clearances per 90</small>
              </h1>
              
              <h1 class='text-success' title='Average number of interceptions every 90 minutes'>".round((90/$minutes_played)*$interceptions,2)."<small> Interceptions per 90</small>
              
              <h1 class='text-success' title='Average number of blocks every 90 minutes'>".round((90/$minutes_played)*$blocks,2)."<small> Blocks per 90</small>
              </h1>
              
             </div>
             
             
              <div class='col-sm-5'>
              <div class='pass_accuracy'>
              <script> 
                anychart.onDocumentReady(function(){
                
                var pass_accuracy = Math.ceil(($pass_comp/$pass_attempt)*100);
                var blank_space = 100-pass_accuracy;

                var shots = [
                {x:'Pass Completed', value:pass_accuracy, exploded:false},
                {x:'Misplaced Passes', value:blank_space},
                ];

                var chart = anychart.pie();

                chart.title('Pass Accuracy: '+pass_accuracy+'%');

                chart.data(shots);

                chart.container('pass_accuracy');

                chart.draw();

                chart.legend().position('right');

                chart.legend().itemsLayout('vertical');

                });
                </script>
                
                <div id='pass_accuracy' style='width:100%; height:100%' title=\"How Often $lname's Passes Find Team Mates\"> </div>
                
                </div>
                
                <div class='tackle_success'>
                 <script> 
                anychart.onDocumentReady(function(){                
                var tackle_success = Math.ceil(($tackle_comp/$tackle_attempt)*100);
                var failed = 100-tackle_success;

                var data = [
                {x:'Tackles Attempted', value:tackle_success, exploded:false},
                {x:'Tackles Successful', value:failed},
                ];

                var chart = anychart.pie();

                chart.title('Tackle Success Rate: '+tackle_success+'%');

                chart.data(data);

                chart.container('tackle_success');

                chart.draw();

                chart.legend().position('right');

                chart.legend().itemsLayout('vertical');

                });
                </script>
                <div id='tackle_success' style='width:100%; height:100%' title=\"$lname's Tackling Success rate \"> </div>
                
                </div>
                
                <div class='aerial_success'>
                 <script> 
                anychart.onDocumentReady(function(){                
                var aerial_success = Math.ceil(($aerials_won/$aerials_contested)*100);
                var failed = 100-aerial_success;

                var data = [
                {x:'Aerials Contested', value:aerial_success, exploded:false},
                {x:'Aerials Won', value:failed},
                ];

                var chart = anychart.pie();

                chart.title('Aerial Success Rate: '+aerial_success+'%');

                chart.data(data);

                chart.container('aerial_success');

                chart.draw();

                chart.legend().position('right');

                chart.legend().itemsLayout('vertical');

                });
                </script>
                <div id='aerial_success' style='width:100%; height:100%' title=\"$lname's Aerial Ball Success Rate \"> </div>
                
                </div>
                    
                </div>
                
                    
         </div>";  
                    
                }else{
                    $position_data = " <div class='col-sm-7'> <div class='jumbotron'> <h3>No Further Details Available</h3> </div> </div> </div> ";
                }
                
            }
        }
    }
    
}

/******************FULL-BACKS****************************/
else if($position=='LB' || $position=='RB' || $position=='RWB' || $position=='LWB'){
    if($result = $conn->query(" SELECT * FROM defenders_rank WHERE player_ID=$player_ID LIMIT 1")){
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                extract($row); //for CB, this will override above extract()
                 //if the player has 0 minutes_played, instead assign number by multiplying by 85 mins
                 $minutes_played = ($minutes_played == 0 ? $appearances*85 : $minutes_played*1);
                
                //code below displays a defenders data in a table
                $player_stats = "
                   <div class='row'> 
                     <div class='col-sm-4'>
                        <table class='table table-hover table-striped'>
                        <tr><td>Appearances</td> <td> $appearances </td></tr>
                        <tr><td>Minutes Played</td> <td> $minutes_played</td></tr>
                        <tr><td>Interceptions</td> <td> $interceptions </td></tr>
                        <tr><td>Tackles Won</td> <td> $tackle_comp</td></tr>
                        <tr><td>Possesion Recoveries</td> <td> $possession_won </td></tr>
                        <tr><td>Clearances</td> <td> $clearances </td></tr>
                        <tr><td>Blocks</td> <td> $blocks </td></tr>
                        <tr><td>Defensive Errors</td> <td> $defensive_errors </td></tr>
                        <tr><td>Chances Created</td> <td> $chances_created </td></tr>
                        <tr><td>Passes Attempted</td> <td> $pass_attempt </td></tr>
                        <tr><td>Passes Completed</td> <td> $pass_comp</td></tr>
                        <tr><td>Crosses Attempted</td> <td> $cross_attempt</td></tr>
                        <tr><td>Assists</td> <td> $assists</td></tr>
                        <tr><td>Goals</td> <td> $goals</td></tr>
                        </table>
                    </div>
                ";
                
                                
                 if(!empty($pass_attempt) && !empty($pass_comp) && !empty($minutes_played) ){
                        
            $position_data = "
                 
             <div class='col-sm-3' style='text-align:center'> 
              
              <h1 class='text-danger' title='Errors leading to shots per 90 minutes'>".round((90/$minutes_played)*$defensive_errors,2)."<small> Defensive errors per 90 </small>
              </h1>
              
              <h1 class='text-success' title='Average number of crosses into the box per 90 minutes'>".round((90/$minutes_played)*$cross_attempt,2)."<small> Crosses per 90 </small>
              </h1>
               
              <h1 class='text-success' title='Average number of possession recoveries every 90 minutes'>".round((90/$minutes_played)*$possession_won,2)."<small> Ball recoveries won per 90 </small>
              </h1>
              
              <h1 class='text-success' title='Average number of Tackles every 90 minutes'>".round((90/$minutes_played)*$tackle_attempt,2)."<small> Tackles attempted per 90</small>
              </h1>
              
              <h1 class='text-success' title='Average number of interceptions every 90 minutes'>".round((90/$minutes_played)*$interceptions,2)."<small> Interceptions per 90</small>
              
              <h1 class='text-success' title='Average number of chances created per 90 minutes'>".round((90/$minutes_played)*$chances_created,2)."<small> Chances created per 90</small>
              </h1>
              
             </div>
             
             
              <div class='col-sm-5'>
              <div class='pass_accuracy'>
              <script> 
                anychart.onDocumentReady(function(){
                
                var pass_accuracy = Math.ceil(($pass_comp/$pass_attempt)*100);
                var blank_space = 100-pass_accuracy;

                var shots = [
                {x:'Pass Completed', value:pass_accuracy, exploded:false},
                {x:'Misplaced Passes', value:blank_space},
                ];

                var chart = anychart.pie();

                chart.title('Pass Accuracy: '+pass_accuracy+'%');

                chart.data(shots);

                chart.container('pass_accuracy');

                chart.draw();

                chart.legend().position('right');

                chart.legend().itemsLayout('vertical');

                });
                </script>
                
                <div id='pass_accuracy' style='width:100%; height:100%' title=\"How Often $lname's Passes Find Team Mates\"> </div>
                
                </div>
                
                <div class='tackle_success'>
                 <script> 
                anychart.onDocumentReady(function(){                
                var tackle_success = Math.ceil(($tackle_comp/$tackle_attempt)*100);
                var failed = 100-tackle_success;

                var data = [
                {x:'Tackles Attempted', value:tackle_success, exploded:false},
                {x:'Tackles Successful', value:failed},
                ];

                var chart = anychart.pie();

                chart.title('Tackle Success Rate: '+tackle_success+'%');

                chart.data(data);

                chart.container('tackle_success');

                chart.draw();

                chart.legend().position('right');

                chart.legend().itemsLayout('vertical');

                });
                </script>
                <div id='tackle_success' style='width:100%; height:100%' title=\"$lname's Tackling Success rate \"> </div>
                
                </div>
                
                <div class='aerial_success'>
                 <script> 
                anychart.onDocumentReady(function(){                
                var aerial_success = Math.ceil(($aerials_won/$aerials_contested)*100);
                var failed = 100-aerial_success;

                var data = [
                {x:'Aerials Contested', value:aerial_success, exploded:false},
                {x:'Aerials Won', value:failed},
                ];

                var chart = anychart.pie();

                chart.title('Aerial Success Rate: '+aerial_success+'%');

                chart.data(data);

                chart.container('aerial_success');

                chart.draw();

                chart.legend().position('right');

                chart.legend().itemsLayout('vertical');

                });
                </script>
                <div id='aerial_success' style='width:100%; height:100%' title=\"$lname's Aerial Ball Success Rate \"> </div>
                
                </div>
                    
                </div>
                
                    
         </div>";  
                    
                }else{
                    $position_data = " <div class='col-sm-7'> <div class='jumbotron'> <h3>No Further Details Available</h3> </div> </div> </div> ";
                }
                
            }
        }
    }
    
}

    
else{
    $position_data =  "<div class='jumbotron'> <h2> Nothing to see here....Yet </h2> </div>";
}
?>