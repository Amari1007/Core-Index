<?php 
session_start();
require("coreDB.php");

if($_SERVER['REQUEST_METHOD']==='POST'){
    extract($_POST);    
}

else{
    echo "<div class='jumbotron'> <h3>Couldn't determine request method</h3> </div>";
}


if($result = $conn->query("SELECT * FROM `mw-fixtures` WHERE date like '$month' limit 10")){
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            extract($row);
                
            $date = strtotime($date);
            $time = strtotime($time); 
                
            if($status=='played'){
                $match_link = " match_view.php?match_ID=$match_ID&code=$code ";
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
            echo " 
                    <ul>
						<li>
							<div id='home_team' style='width:45%;float:left;text-align:right;overflow:hidden;'>$home_team</div>
                            
                            <a href='$match_link'>
                            <div id='scores' style='width:10%;float:none;'>
							<div style='float:left;width:48%;text-align:center;background-color:#2866f6;font-weight:bold;color:white;padding:5px;'>$home_goals</div>
                            
                            <div style='float:right;width:50%;text-align:center;background-color:#2866f6;font-weight:bold;color:white;padding:5px;'>$away_goals</div>
                            
                            </div>
							</a>
                            
                            <div id='away_team' style='width:45%;float:right;text-align:left;overflow:hidden;'>$away_team 
                            ".(
                                isset($_SESSION['user_type'])&&isset($_SESSION['user_id'])?" <a data-toggle='collapse' data-target='#view_$match_ID'> &bull; Edit ?  </a>
                           
                            </div>
						</li>                                                       
                            
                            <div id='view_$match_ID' class='collapse'>
                                <form id='event_form_$match_ID' name='event_form_$match_ID' class='form-horizontal' style='border:1px solid black;margin:auto;width:60%;text-align:center;background:#333333;color:white;border-radius:7px'>
                                    <caption> <h4>Match ID:$match_ID</h4> </caption>
                                    
                                    <div class='form-group'>
                                        <label for='#$venue'>Venue <span class='glyphicon glyphicon-home'></span> </label>
                                        <input id='$venue' type='text' value='$venue' name='venue' style='color:black'>  
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label for='#$referee'>Referee</label>
                                        <input id='$referee' type='text' value='$referee' name='referee' style='color:black'>  
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label for='#$home_team'>Home Team</label>
                                        <input type='text' value='$home_team' id='$home_team' name='home_team' style='color:black'> 
                                        <label>Goals</label>
                                        <input type='number' value='$home_goals' min='0' max='15' step='1' name='home_goals`' style='width:50px;color:black;'>  
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label for='#$away_team'>Away Team</label>
                                        <input type='text' value='$away_team' id='$away_team' name='away_team' style='color:black'>
                                        <label>Goals</label>
                                        <input type='number' value='$away_goals' min='0' max='15' step='1' name='away_goals' style='width:50px;color:black;'>
                                    </div>
                                    
                                    <div class='form-group'> 
                                        <button id='submit_event_changes_$match_ID' class='btn btn-success' type='submit' value='Apply Changes'
                                        onclick='alert(event_form_$match_ID.venue.value)'>
                                        <span class='glyphicon glyphicon-save'></span> Apply Changes
                                        </button>
                                    </div>
                                </form>                                
                            </div>":"</div>"
                                            
                            )."                        
					</ul>  
                    
                 ";              
        }   
    }else{
         echo "<div class='jumbotron'> <h2>No fixtures available</h2> </div>";
    }    
}

$conn->close();
exit();
?>
