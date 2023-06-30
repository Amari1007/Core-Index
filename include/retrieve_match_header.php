<?php  

//Status = [played,disabled,live,upcoming,report,postponed];
if($result = $conn->query("SELECT * FROM fixtures WHERE match_ID=$match_ID LIMIT 1")){
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            extract($row);
            
            //code below retrieves Home Club pic
            $home_team_logo = NULL;
            if($club_pic_home = $conn->query("SELECT * FROM clubs WHERE club_name LIKE '%$home_team%' AND league_code='mw-tsl' LIMIT 1 ")){
                if($club_pic_home->num_rows>0){
                    while($get_pic_home = $club_pic_home->fetch_assoc()){
                        $home_team_logo = $get_pic_home['club_pic'];
                        }

                    }else{
                        $home_team_logo = NULL;                
                    }
                }else{
                $home_team_logo = NULL;
            }
            
            //code below retrieves Away Club pic
            $away_team_logo = NULL;
            if($club_pic_away = $conn->query("SELECT * FROM clubs WHERE club_name LIKE '%$away_team%' AND league_code='mw-tsl' LIMIT 1 ")){
                if($club_pic_away->num_rows>0){
                    while($get_pic_away = $club_pic_away->fetch_assoc()){
                        $away_team_logo = $get_pic_away['club_pic'];
                        }

                    }else{
                        $away_team_logo = NULL;                
                    }
                }else{
                $away_team_logo = NULL;
            }
            
            $date = strtotime($date);
            $date = date("D d M, Y",$date); //converts date milliseconds to string date
            $time = strtotime($time); //converts to time value if original value is text
            $time = date("H:i",$time); // converts to string Hour:Minute time format
            $scores = " ";
			$get_home_scorers = json_decode($home_scorers,true);
			$get_away_scorers = json_decode($away_scorers,true);
			
			if(isset($get_home_scorers)){
				if(count($get_home_scorers['data'])>0){				
					$display_home_scorers=NULL;
					for($counter=0;$counter<count($get_home_scorers['data']);$counter++){
						$display_home_scorers .= $get_home_scorers['data'][$counter]['name']." (".$get_home_scorers['data'][$counter]['minute']."') ";	
					}	
				}
			}else{
				$display_home_scorers=NULL;
			}
			
			if(isset($get_away_scorers)){
				if(count($get_away_scorers['data'])>0){
					$display_away_scorers=NULL;
					for($counter=0;$counter<count($get_away_scorers['data']);$counter++){
						$display_away_scorers .= $get_away_scorers['data'][$counter]['name']." (".$get_away_scorers['data'][$counter]['minute']."') ";	
					}
				}
			}else{
				$display_away_scorers=NULL;
			}
			
            //code below will determin score or KO time output
            if($status == 'live'){
				echo "
			
			<div class='a1'> 
			
				<div class='fader'> <!-- '.fader' fades background picture -->
			
					<div class='b1'> 
					
							<div class='header_box'> $date | $competition | MD $MD</div>					
							
							<div class='c1'> 
								<div class='home_box'> 
									<div class='home_logo'> <img src='{$home_team_logo}' width='100px' class='img-circle' onerror='match_view_team_imgerror(this)' alt='{$home_team}.logo'/> </div>
									<div class='home_name'>$home_team</div> 
									<div class='home_scorers'> <span>$display_home_scorers</span> </div>
								</div>
								
								<div class='team_scores'>
									<div class='score_box_live'>
											<div class='home_score'>$home_goals</div>
											<div class='away_score'>$away_goals</div>
									</div>
									
									<div class='time_elapsed' style='font-size:20px'>LIVE'</div>
									<div class='half_time_txt'>HT</div>
									<div class='half_time_score'> - </div>
								</div>
								
								<div class='away_box'> 
									<div class='away_logo'> <img src='{$away_team_logo}' width='100px' class='img-circle' onerror='match_view_team_imgerror(this)' alt='{$away_team}.logo'/> </div>
									<div class='away_name'>$away_team</div>
									<div class='away_scorers'> <span>$display_away_scorers</span> </div> 
								</div>
							</div>
						
					</div>			
				
				</div>
				
			</div>  
			";
            }
            elseif($status == 'upcoming'){
				echo "
			
			<div class='a1'> 
			
				<div class='fader'> <!-- '.fader' fades background picture -->
			
					<div class='b1'> 
					
							<div class='header_box'> $date | $competition | MD $MD</div>					
							
							<div class='c1'> 
								<div class='home_box'> 
									<div class='home_logo'> <img src='{$home_team_logo}' width='100px' class='img-circle' onerror='match_view_team_imgerror(this)' alt='{$home_team}.logo'/> </div>
									<div class='home_name'>$home_team</div> 
									<div class='home_scorers'> <span>$display_home_scorers</span> </div>
								</div>
								
								<div class='team_scores'>
									<div class='score_box'>
											<div class='KO_time'>$time</div>
									</div>
									
									<div class='time_elapsed'>$minutes_played</div>
									<div class='half_time_txt'></div>
									<div class='half_time_score'></div>
								</div>
								
								<div class='away_box'> 
									<div class='away_logo'> <img src='{$away_team_logo}' width='100px' class='img-circle' onerror='match_view_team_imgerror(this)' alt='{$away_team}.logo'/> </div>
									<div class='away_name'>$away_team</div>
									<div class='away_scorers'> <span>$display_away_scorers</span> </div> 
								</div>
							</div>
						
					</div>			
				
				</div>
				
			</div>  
			";
                
            }
            elseif($status == 'played' || $status=='disabled' || $status == 'report'){
				echo "
			
			<div class='a1'> 
			
				<div class='fader'> <!-- '.fader' fades background picture -->
			
					<div class='b1'> 
					
							<div class='header_box'> $date | $competition | MD $MD</div>					
							
							<div class='c1'> 
								<div class='home_box'> 
									<div class='home_logo'> <img src='{$home_team_logo}' width='100px' class='img-circle' onerror='match_view_team_imgerror(this)' alt='{$home_team}.logo'/> </div>
									<div class='home_name'>$home_team</div> 
									<div class='home_scorers'> <span>$display_home_scorers</span> </div>
								</div>
								
								<div class='team_scores'>
									<div class='score_box'>
											<div class='home_score'>$home_goals</div>
											<div class='away_score'>$away_goals</div>
									</div>
									
									<div class='time_elapsed'>$minutes_played</div>
									<div class='half_time_txt'>HT</div>
									<div class='half_time_score'> - </div>
								</div>
								
								<div class='away_box'> 
									<div class='away_logo'> <img src='{$away_team_logo}' width='100px' class='img-circle' onerror='match_view_team_imgerror(this)' alt='{$away_team}.logo'/> </div>
									<div class='away_name'>$away_team</div>
									<div class='away_scorers'> <span>$display_away_scorers</span> </div> 
								</div>
							</div>
						
					</div>			
				
				</div>
				
			</div>  
			";
                
            }
            else{
                echo "
                <div style='width:100%;text-align:center;background-color:#b3b3b3c4;font-weight:bold;color:black;padding:5px;'>
                    Error:404
                </div>
                ";                
            }
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