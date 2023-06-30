<?php 
require("coreDB.php");

if( !isset($_GET['match_ID']) ){ 
	header("Location:../leagues.php");
	exit();
}
else{
	extract($_GET);  
}

if($result = $conn->query("SELECT `home_lineup`,`away_lineup` FROM `fixtures` WHERE match_ID=$match_ID LIMIT 1")){
    if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
				extract($row);			
				$away_squad = json_decode($away_lineup,true);//GET AWAY LINEUP
				$home_squad = json_decode($home_lineup,true);//GET HOME LINEUP
				
				//GET HOME LINEUP
				/*echo "
				<div id='home_lineup'>
					<h3> Away Coach </h3>
					<h3> Home Starting XI </h3>
					<div class='lineup_player'> <span>Player</span> </div>
					
					<div style='margin-top:30px'> 
						<h4>Substitutes</h4>
						<div class='lineup_player'> <span>Player</span> </div>
					</div>
					
				</div>
				
				<div id='away_lineup'>
					<h3> Away Coach </h3>
					<h3> Away Starting XI </h3>
					<div class='lineup_player'> <span>Player</span> </div>
					
					<div style='margin-top:30px'> 
						<h4>Substitutes</h4>
						<div class='lineup_player'> <span>Player</span> </div>
					</div>
				</div>
				";*/
				
				if( isset($home_squad) && isset($home_squad['home_squad']['starting_lineup']) ){
					echo "<div id='home_lineup'> <h3> Home Starting XI </h3>";
					if( count($home_squad['home_squad']['starting_lineup'])>0){
						$player=NULL;
						echo "<div id='home_lineup'>"; //START HOME SQUAD BOX
						for($x=0; $x<count($home_squad['home_squad']['starting_lineup']); $x++){
							$player = $home_squad['home_squad']['starting_lineup'][$x];
							echo("<div class='lineup_player'>$player</div>");
						}	
						
					}else{
						echo "<h3> Starting XI N/A </h3>";
					}
					
					//GET HOME SUBSTITUTES
					if(isset($home_squad['home_squad']['substitues']) ){
						if( count($home_squad['home_squad']['substitues'])>0){
							$player=NULL;
							echo "<div style='margin-top:30px'> <h4>Substitutes</h4>";
							for($x=0; $x<count($home_squad['home_squad']['substitues']); $x++){
								$player = $home_squad['home_squad']['substitues'][$x];
								echo("<div class='lineup_player'>$player</div>");								
							}	
							echo "</div>"; //COMPLETES HOME SUBSTITUTE BOX
							echo "</div>"; //COMPLETE HOME SQUAD BOX
							
						}else{
							echo "<div style='margin-top:30px'> <h4>Substitutes N/A</h4> </div>";
							echo "</div>"; //COMPLETE HOME SQUAD BOX
						}
					}else{
						echo "<div style='margin-top:30px'> <h3> Substitutes N/A</h3> </div>";
						echo "</div>"; //COMPLETE HOME SQUAD BOX
					}
					
				}else{
					echo " <div id='home_lineup'> <h3> Home Squad N/A </h3> </div> ";
					}
					
				//GET AWAY LINEUP
				if(isset($away_squad) && isset($away_squad['away_squad']['starting_lineup']) ){
					echo "<div id='away_lineup'> <h3> Away Starting XI </h3>";					
					if( count($away_squad['away_squad']['starting_lineup'])>0){
						$player=NULL;
						for($x=0; $x<count($away_squad['away_squad']['starting_lineup']); $x++){
							$player = $away_squad['away_squad']['starting_lineup'][$x];
							echo("<div class='lineup_player'>$player</div>");
						}
						
					}else{
						echo "<h3> Starting XI N/A </h3>";
					}
					
					//GET AWAY SUBSTITUTES
					if( isset($away_squad['away_squad']['substitues']) ){
						if( count($away_squad['away_squad']['substitues'])>0){
							$player=NULL;
							echo "<div style='margin-top:30px'> <h4>Substitutes</h4>";
							for( $x=0; $x<count($away_squad['away_squad']['substitues']); $x++){
								$player = $away_squad['away_squad']['substitues'][$x];
								echo("<div class='lineup_player'> $player </div>");
							}
						echo "</div>"; //COMPLETE AWAY SUBSTITUTE BOX
						echo "</div>"; //COMPLETE AWAY SQUAD BOX
							
						}else{
							echo "<div style='margin-top:30px'> <h4>Substitutes N/A</h4> </div>";
							echo "</div>"; //COMPLETE AWAY SQUAD BOX
						}
					}else{
						echo "<div style='margin-top:30px'> <h3> Substitutes N/A</h3> </div>";
						echo "</div>"; //COMPLETE HOME SQUAD BOX
					}
					
				}else{
					echo "<div id='away_lineup'> <h3>Away Squad N/A </h3> </div>";
					}
					
		}
		
	}                
}

?>
