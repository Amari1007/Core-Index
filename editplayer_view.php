<?php
session_start();
require_once("include/coreDB.php");

if(empty($_GET['playerid'])){
    header("Location: editplayer.php"); //redirects if playerid is invalid
        
}else{
    $id = $_GET['playerid'];
//    $position = $_GET['position']; not yet available
}

    if($result = $conn->query("select * from players where player_ID=$id")){ 
        if($result->num_rows > 0){            
            while($row = $result->fetch_assoc()){ 
               extract($row); //You can retrieve all the values from an array with words as keys
        }
    }
}
     

?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once("include/headCode.php") ;?>    
    <head>
        <link rel="stylesheet" type="text/css" href="css/communityeditplayerphp/style.css"/>
        
        <script src="js/player_bio_update.js">            
        </script>
        
        <script src="js/editplayer_update_goalcontributions.js">
        </script>
        
        <script src="js/physical_attributes_update.js">
        </script>
        
        <script src="js/editplayer_update_technical_ability.js">
        </script>
        
        <script src="js/editplayer_update_defensivequalities.js">
        </script>
        
        
    </head>

    <body>
    <?php require_once("include/header.php") ?>

    <main class="container-fluid">
        <div class="jumbotron" style="background:white ">
            <h2>Edit <?php echo $fname.' '.$lname ?> player profile &bull;  <small>Current Season 2022/23</small> &bull; <img width="80" class="img-circle" src="<?php echo $player_pic ?>" title="<?php echo $fname.' '.$lname ?>" onerror="player_imgerror(this)" alt="<?php echo $fname.' '.$lname.'.jpg' ?>">  </h2>
            
        </div>
        
        <div class="row">
                        
            <div class="col-sm-4">            
                 <h4>Player Bio</h4>
                 <table class="table" style="width:100%" id="player_bio">
                     <tr>
                       <td>ID</td>
                       <td> <input id="id" type="number" name="id" value="<?php echo $id ?>" title="Uneditable" disabled >
                       </td>                    
                     </tr>

                    <tr>
                        <td>First name</td>
                        <td> <input id="fname" type="text" name="fname" value="<?php echo $fname ?>" title="Type in to change" enabled required></td> 
                    </tr>

                    <tr>
                        <td>Surname</td>
                        <td> <input id="lname" type="text" name="lname" value="<?php echo $lname ?>" title="Type in to change" enabled required>
                        </td>
                    </tr>
                     
                    <tr>
                        <td>Age</td>
                        <td> <input id="age" type="number" name="age" value="<?php echo $age ?>" title="Type in to change" enabled required>
                        </td>
                    </tr>

                     <tr>
                        <td>Position</td>
                        <td>
                         <select name="position" id="position">
                             <option value="GK" <?php echo($position=='GK'?'selected':'') ?> >GK</option>
                             <option value="CB" <?php echo($position=='CB'?'selected':'')?> >CB</option>
                             <option value="RB" <?php echo($position=='RB'?'selected':'')?> >RB</option>
                             <option value="LB" <?php echo($position=='LB'?'selected':'')?> >LB</option>
                             <option value="LWB" <?php echo($position=='LWB'?'selected':'')?> >LWB</option>
                             <option value="RWB" <?php echo($position=='RWB'?'selected':'')?> >RWB</option>
                             <option value="CDM" <?php echo($position=='CDM'?'selected':'')?> >CDM</option>
                             <option value="CM" <?php echo($position=='CM'?'selected':'')?> >CM</option>
                             <option value="CAM" <?php echo($position=='CAM'?'selected':'')?> >CAM</option>
                             <option value="LM" <?php echo($position=='LM'?'selected':'')?> >LM</option>
                             <option value="RM" <?php echo($position=='RM'?'selected':'')?> >RM</option>
                             <option value="LW" <?php echo($position=='LW'?'selected':'')?> >LW</option>
                             <option value="RW" <?php echo($position=='RW'?'selected':'')?> >RW</option>
                             <option value="CF" <?php echo($position=='CF'?'selected':'')?> >CF</option>
                             <option value="ST" <?php echo($position=='ST'?'selected':'')?> >ST</option>
                         </select>
                         </td>
                     
                     </tr>
                     
                     <tr>
                         <td>Club</td>
                         <td> <?php echo $club ?> </td>
                                          
                     </tr>
                     
                     <tr>
                        <td>Kit Number</td>
                        <td> <input id="kit" type="number" name="kit" value="<?php echo $kit ?>" title="Type in to change" enabled required>
                        </td>
                    </tr>

                   <tr> 
                       <td colspan="2"><button class="btn btn-success">Update</button> </td>                  
                   </tr>

                </table>
              
            </div>
                          
            <div class="col-sm-4">
                <h4>Goal Contributions</h4>
                 <table class="table" style="width:100%" id="goal_contributions">
                     <tr>
                       <td>Goals</td>
                       <td> <input id="goals" type="number" name="goals" value="<?php echo $goals ?>" title="Type in to change">
                       </td>                    
                     </tr>
                   
                     <tr>
                       <td>Assists</td>
                       <td> <input id="assists" type="number" name="assists" value="<?php echo $assists ?>" title="Type in to change">
                       </td>                    
                     </tr>
                                     
                     <tr>
                       <td>Chances created</td>
                       <td> <input id="chances_created" type="number" name="chances_created" value="<?php echo $chances_created ?>" title="Type in to change">
                       </td>                    
                     </tr>

                   <tr> 
                       <td colspan="2"><button class="btn btn-success">Update</button> </td>                  
                   </tr>

                </table>
              
            </div>
                         
            <div class="col-sm-4">
                <h4>Physical Attributes</h4>
                 <table class="table" style="width:100%" id="physical_attributes">
                     <tr>
                       <td>Height</td>
                       <td> <input id="height" type="number" name="height" value="<?php echo $height ?>" title="Type in to change">
                       </td>                    
                     </tr>
                   
                     <tr>
                       <td>Weight</td>
                       <td> <input id="weight" type="number" name="weight" value="<?php echo $weight ?>" title="Type in to change">
                       </td>                    
                     </tr>
                     
                   <tr> 
                       <td colspan="2"><button class="btn btn-success">Update</button> </td>                  
                   </tr>

                </table>
              
            </div>
        </div>
        
        <div class="row">
                         
            <div class="col-sm-4">
                <h4>Technical Ability</h4>
                 <table class="table" style="width:100%" id="technical_ability">
                     <tr>
                       <td>Passes Attempted</td>
                       <td> <input id="pass_attempt" type="number" value="<?php echo $pass_attempt ?>" title="Type in to change">
                       </td>                    
                     </tr>
                   
                     <tr>
                       <td>Passes Completed</td>
                       <td> <input id="pass_comp" type="number" value="<?php echo $pass_comp ?>" title="Type in to change">
                       </td>                    
                     </tr>
                   
                     <tr>
                       <td>Dribbles Attempted</td>
                       <td> <input id="dribble_attempt" type="number" value="<?php echo $dribble_attempt ?>" title="Type in to change">
                       </td>                    
                     </tr>
                   
                     <tr>
                       <td>Dribbles Completed</td>
                       <td> <input id="dribble_comp" type="number" name="dribble_comp" value="<?php echo $dribble_comp ?>" title="Type in to change">
                       </td>                    
                     </tr>
                   
                     <tr>
                       <td>Shots On Goal</td>
                       <td> <input id="shots" type="number" name="shots" value="<?php echo $shots ?>" title="Type in to change">
                       </td>                    
                     </tr>
                     
                   <tr> 
                       <td colspan="2"><button class="btn btn-success">Update</button> </td>                  
                   </tr>

                </table>
              
            </div>       
                         
            <div class="col-sm-4">
                <h4>Defensive Qualities</h4>
                 <table class="table" style="width:100%" id="defensive_qualities">
                     <tr>
                       <td>Tackles Attempted</td>
                       <td> <input id="tackle_attempt" type="number" value="<?php echo $tackle_attempt ?>" title="Type in to change">
                       </td>                    
                     </tr>
                   
                     <tr>
                       <td>Tackles Won</td>
                       <td> <input id="tackle_comp" type="number" value="<?php echo $tackle_comp ?>" title="Type in to change">
                       </td>                    
                     </tr>
                   
                     <tr>
                       <td>Aerial Balls Contested</td>
                       <td> <input id="aerials_contested" type="number" value="<?php echo $aerials_contested ?>" title="Type in to change">
                       </td>                    
                     </tr>
                   
                     <tr>
                       <td>Aerial Balls Won</td>
                       <td> <input id="aerials_won" type="number" value="<?php echo $aerials_won ?>" title="Type in to change">
                       </td>                    
                     </tr>
                   
                     <tr>
                       <td>Pass Interceptions</td>
                       <td> <input id="interceptions" type="number" value="<?php echo $interceptions ?>" title="Type in to change">
                       </td>                    
                     </tr>
                                  
                     <tr>
                       <td>Clean Sheets</td>
                       <td> <input id="clean_sheets" type="number"  value="<?php echo $clean_sheets ?>" title="Type in to change">
                       </td>                    
                     </tr>
                     
                   <tr> 
                       <td colspan="2"><button class="btn btn-success">Update</button> </td>                  
                   </tr>

                </table>
              
            </div>

        </div>
        
        
    </main>
    
   <?php include_once("include/footer.php"); ?>
    
</body>    
</html>