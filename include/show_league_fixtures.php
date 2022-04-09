<?php 
session_start();
require("coreDB.php");

if($_SERVER['REQUEST_METHOD']==='POST'){
    extract($_POST);    
}

else{
    echo "<div class='jumbotron'> <h3>Couldn't determine request method</h3> </div>";
}


if($result = $conn->query("SELECT * FROM `mw-fixtures` WHERE date like '$month' limit 1")){
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            extract($row);
                
            $date = strtotime($date);
            $time = strtotime($time); //converts to time value if original value is text
            $time = date("H:i",$time); // converts to string Hour:Minute time format
            $scores = " ";
                
            if($status==='live'){
                $scores = "
                <div id='scores'>
                <a href='match_view.php?match_ID=$match_ID&competition=$competition'>
                    <div style='float:left;width:49%;text-align:center;background-color:#2866f6;font-weight:bold;color:white;padding:3px;'>$home_goals</div>

                    <div style='float:right;width:50%;text-align:center;background-color:#2866f6;font-weight:bold;color:white;padding:3px;'>$away_goals </div>
                </a>
                <span style='text-align:center;display:block;color:#2866f6;font-size:13px'>&bull; live</span>
                </div>                
                ";
            }
            else if($status==='upcoming'){
                $scores = "
                <div id='scores'>
                <a>
                    <div style='width:100%;text-align:center;background-color:#dbdbdb;font-weight:bold;color:black;padding:3px;overflow:hidden;'>$time</div> 
                </a>
                <span style='text-align:center;display:block;color:black;font-size:13px'></span>
                </div>
                "; 
            }
            else if($status=='played'){ 
                $scores = "                
                <div id='scores'>
                <a>
                    <div style='float:left;width:49%;text-align:center;background-color:#ffd230;font-weight:bold;color:black;padding:3px;'>$home_goals</div>

                    <div style='float:right;width:50%;text-align:center;background-color:#ffd230;font-weight:bold;color:black;padding:3px;'>$away_goals </div>
                </a>
                <span style='text-align:center;display:block;color:black;font-size:12px'>FT</span>
                </div>    
                ";
            }
            else if($status=='report'){                
                $scores = "
                <div id='scores'>
                <a href='match_view.php?match_ID=$match_ID&competition=$competition'>
                    <div style='float:left;width:49%;text-align:center;background-color:#ffd230;font-weight:bold;color:black;padding:3px;'>$home_goals</div>

                    <div style='float:right;width:50%;text-align:center;background-color:#ffd230;font-weight:bold;color:black;padding:3px;'>$away_goals</div>
                </a>
                <span style='text-align:center;display:block;color:black;font-size:12px'>FT</span>
                </div> 
                ";
            }
            else{
                $scores = "                
                <div id='scores'>
                <a>
                    <div style='width:100%;text-align:center;background-color:#dbdbdb;font-weight:bold;color:black;padding:3px;overflow:hidden;'>$time</div> 
                </a>
                <span style='text-align:center;display:block;color:black;font-size:13px'></span>
                </div>
                ";
            }
            
            //code below creates a new table every time
            echo " 
                    <ul>
						<li>
							<div id='home_team' style='width:46%;float:left;text-align:right;overflow:hidden;'>$home_team</div>
                            
                            $scores
                            
                            <div id='away_team' style='width:46%;float:right;text-align:left;overflow:hidden;'>$away_team 
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
