<?php 
session_start();
require_once("include/coreDB.php");

    //check if post or get method was used
            
     if($_SERVER['REQUEST_METHOD']=='GET' || $_SERVER['REQUEST_METHOD']=='POST'){
         if(!isset($_GET['clubid'])){
                //return to index if no player was chosen i.e. playerid not set
                header("location:index.php?redirected:invalid_club_id");
            }else{
               $clubid = $_GET['clubid']; //store clubid value if verified above
               $club_name = $_GET['club_name']; 
            }   

            } 
        
        //output rows from club table
        if($result = $conn->query("SELECT * FROM clubs WHERE club_ID=$clubid LIMIT 1")){
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    extract($row);
                    
                    $output = "
                    
             <table class='table-hover'>
                 <tr>
                    <td colspan='2' style='text-align:center'><img class='img-circle' width='120' src=".$row['club_pic']." alt='image N/A'></td>		
                </tr>
                <tr>
                    <td>Club Name</td>
                    <td> <a href='clubview.php?clubid=$clubid&club_name=$club_name'>".$row['club_name']."</a></td>		
                </tr>
                <tr>
                    <td>Home Stadium</td>
                    <td>$stadium".($stadium_capacity!=null?', ('.$stadium_capacity.' Capacity)':'')."</td>		
                </tr>
                <tr>
                    <td>Manager</td>
                    <td>".$row['manager']."</td>		
                </tr>
                <tr>
                    <td>Formation</td>
                    <td>".$row['formation']."</td>		
                </tr>
                <tr>
                    <td>League</td>   
                    <td>".$row['league']."</td>		
                </tr>  
                 <tr>
                    <td>League Position</td>   
                    <td> <span class=p".$league_position.">".$league_position." </span> </td>		
                </tr>  
                 <tr>
                    <td>Club Score</td>   
                    <td> </td>
                </tr>  
                 <tr>
                    <td>Overall Ranking</td>   
                    <td> </td>		
                </tr>  
  
                </table>
                    ";
                }
            }else{
                echo "No results where found";
            }            
        } 

?>

<!DOCTYPE html>
<html>
    <?php require_once("include/headCode.php") ;?> 
    
    <link rel="stylesheet" type="text/css" href="css/clubviewphp/style.css">

    <body>
       <?php require_once("include/header.php") ?>
        
        <main class="container">
            
            <div class="row">
                
                <div class="col-sm-7">  
                    
                    <!--outputs code from selected club-->
                    <?php echo $output ;?> 
                    
                </div>
                
                <!--code below displays club information in a table-->
                <div class="col-sm-5">
                    <table class="table-striped">
                        
                        
                        
                        <th colspan="2">Player Roles</th>
                        <tr><td>Captain</td> <td><?php echo $captain ;?></td></tr>
                        <tr><td>Vice Captain</td> <td><?php echo $v_captain ;?></td></tr>
                        <tr><td>Penalties</td><td> <?php echo $pk_taker ;?></td></tr>
                        <tr><td>Left Corner</td> <td><?php echo $l_corner ;?></td></tr>
                        <tr><td>Right Corner</td> <td><?php echo $r_corner ;?></td></tr>
                        <tr><td>Long Free Kick</td> <td><?php echo $long_fk ;?></td></tr>
                        <tr><td>Short Free Kick</td> <td><?php echo $short_fk ;?></td></tr>
                    </table>
                
                </div>
            
            </div>
             
            <!-- code below displays the club's latest fixtures -->
            <div id="fixture_list">
            <section class="league_fixtures">
                <h3>Latest Fixtures</h3>
                
            <?php 
                
           require("include/coreDB.php");
                
                //looking for the club in db then searching in fixtures
            if($result2 = $conn->query("SELECT * FROM `clubs` WHERE club_name like'%$club_name%' limit 1")){
                if($result2->num_rows>0){
                    while($clubdata = $result2->fetch_assoc()){
                        extract($clubdata);
           
            if($result=$conn->query("SELECT * FROM `$league_code-fixtures` where home_team like'%$club_name%' or away_team like'%$club_name%' ORDER BY `date` DESC")){
            
            if($result->num_rows > 0){
            
            while($row = $result->fetch_assoc()){
            extract($row);
               
            $date = strtotime($date); //converts date to date format
            $time = strtotime($time); //converts time to time format            
            $code = !isset($code)? "mw-tsl" :$code ; //will need to be changed to accomodate future leagues
                
            if($status=='played'){
                //link below will need to be changed in future to accomodate other leagues
                $match_link = " <a href='match_view.php?match_ID=$match_ID&code=$code&league_name=$league&fixtures=$code-fixtures'>$home_goals-$away_goals</a> ";
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
            <span><b>".date('M D d',$date)."</b></span>
            <table class='table table-hover table-responsive' style='width:100%; margin: 0px auto; margin-bottom:30px'>
            <tr>
            <td style='width:40%'>$home_team</td> 
            <td style='width:20%' title='See Match Details'>$match_link</td> 
            <td style='width:40%'>$away_team</td> 
            </tr>  
            </table>   
            ";              
            }   
            }else{
            echo "<div class='jumbotron'> <h3>Fixtures Currently Unavailable 1</h3> </div>";
            }    
            }else{
               echo "<div class='jumbotron'> <h3>Fixtures Currently Unavailable 2</h3> </div>";
           }
                    }
                }else{
                    echo "<div class='jumbotron'><h3>Fixtures Currently Unavailable 3</h3> </div>";
                }
            }else{
                    echo "<div class='jumbotron'> <h3>Couldn't Execute Query</h3> </div>";
            }
                

            $conn->close(); //closed connection to database here
            ?>
            </section>
            </div>
            
            <!--DISPLAY PLAYERS FROM CLUB-->
            <div style="width:80%; margin:auto">
                <h3>Squad List</h3>
                <table class="table-striped">
                    <tr><th colspan="2">Player Name</th><th>Position</th><th>Age</th><th>Score</th></tr>
        
                    <?php 
                    require("include/coreDB.php");
                    
                    //output players from player table matching club name
                    if($result = $conn->query("SELECT * FROM players WHERE club='$club_name' ")){
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                extract($row);;
                                $nationalpic = '';
                            
                            //code below will get national_team pic affiliated to $nationality
                        if($result2 = $conn->query("SELECT nation_pic FROM national_team WHERE nation_name='$nationality' LIMIT 1")){
                                    if($result2->num_rows > 0){
                                       while($row2 = $result2->fetch_assoc()){
                                           $nationalpic = $row2['nation_pic'];
                                       } 
                                    }else{
                                        $error = "Error 4";
                                    }
                                }else{
                                        $nationalpic = '';
                                     }

                                echo ("
                                           
                                <script>            
                                    $('document').ready(function(){
                                        $('.player_id_$player_ID').click(function(){
                                            var player_id_$player_ID = {playerid:$player_ID, fname:'$fname', lname:'$lname', club_name:'$club', nationality:'$nationality'} 
                                            var x = JSON.stringify(player_id_$player_ID);

                                            $.post(
                                                'include/player_data.php',
                                                {
                                                    data:x
                                                },
                                                function(data,status){
                                                    if(status=='success'){
                                                        window.open(data, '_parent');
                                                    }else{
                                                        window.open(' ".( htmlspecialchars($_SERVER['PHP_SELF']) )." ', '_parent');
                                                    }                            
                                                }
                                            );

                                        });
                                    });
                                </script>
                                <tr>
                                <td> 
                                <a class='player_id_$player_ID' style='cursor:pointer' title='Get to know $fname $lname'>$fname $lname</a>
                                </td> 
                                <td> 
                                <img class='img-rounded' src='$player_pic' width='50' onerror='player_imgerror(this)' alt='$fname $lname.jpg'> 
                                <img id='nation_pic' src='$nationalpic' width='30' onerror='team_imgerror(this)' alt='N/A'>
                                </td>
                                <td> <span class='$position'> $position </span> </td> 
                                <td>$age</td>                                    
                                <td>N/A</td>                                    
                                </tr>
                                ");
                            }
                        }else{
                            $error = "Error 2";
                        }
                    }else{
                        $error = "Error 1";
                    }
                    ?>
                    
                </table>
            </div>
            
            
        </main>                             
    
       <?php require_once("include/footer.php"); ?>  
        
    </body>

</html>