<?php
session_start();

require_once("include/coreDB.php");

if(!isset($_GET['code'])){
    header('Location:leagues.php');
}
else{
    extract($_GET);
}

?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once("include/headCode.php") ;?>    
    <head>
    <link rel="stylesheet" type="text/css" href="css/league_powerrankingsphp/style.css"/>
    </head>

    <body>
    
    <?php require_once("include/header.php") ?>
  
    <?php require_once("include/league_navtab.php") ?>     
    
        <main class="container">
            
        <div class="table-responsive">
            
        <?php 
    
        /**code below only selects from DEFENDERS (CB,LB,RB,RWB,LWB) will be revisited later**/

        if($result = $conn->query("SELECT * FROM `player_points` order by rating*1 DESC limit 50 ")){

        //execute query in database and store results in $result var
        if($result->num_rows > 0 ){

        echo "<table class='table table-striped'>
        <thead>
        <tr>
        <th class='player_number' style='width:5%'>Rank</th>
        <th class='player_photo' style='width:10%'></th>
        <th class='player_nationality' style='width:5%'></th>
        <th class='player_name' style='width:20%'></th>
        <th class='player_score' style='width:15%'>Rating</th>
        <th class='player_position' style='width:5%'>Position(s)</th>
        <th class='player_age' style='width:5%'>Age</th>
        <th class='player_club' style='width:35%'>Club</th>              
        </tr>   
        </thead>        


        ";//establishes table structure
            $row_num=0; //to display player rank number
        while($row = $result->fetch_assoc()){
        extract($row); //extract all column names

        //$club_pic='N/a';
        if($result2=$conn->query("SELECT club_ID,club_name,club_pic FROM `clubs` WHERE club_name like '%$club%'")){
        if($result2->num_rows>0){
        while($get_club = $result2->fetch_assoc()){
            extract($get_club);
        }

        }else{
        $club_pic='';
        $club_ID=null;
        }
        }else{
        $club_pic='';
        $club_ID='';
        }


        if($result3=$conn->query("SELECT national_name,nation_pic FROM `national_team` WHERE nation_name like '%$nationality%' ")){
        if($result3->num_rows>0){
        while($get_national = $result3->fetch_assoc()){
            extract($get_national);
        }

        }else{
        $nation_pic='';
        }
        }else{
        $nation_pic='';
        }
            
        $row_num+=1; //to display player rank number
        echo "
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
        <td> <span class=' ".( $row_num==1 ? "btn btn-success": "btn btn-danger")." ' style='font-weight:600'>$row_num<span> </td>
        <td> 
        <figure> 
        <a class='player_id_$player_ID' style='cursor:pointer' title='Get to know $fname $lname'> 
        <img width='60' class='img-circle' src='$player_pic' onerror='player_imgerror(this)' alt='$fname $lname.png'>
        </a>                
        </figure> 
        </td>

        <td style='padding-top:25px'> 
        <figure> 
        <img width='25' src='$nation_pic' onerror='team_imgerror(this)' alt='$nationality.png'>
        </figure> 
        </td>

        <td style='padding-top:25px'> <a class='player_id_$player_ID' style='cursor:pointer' title='Get to know $fname $lname'>$fname $lname</a>
        </td>
        
        <td style='padding-top:25px'> <span class='score'>$rating/10</span>".( $row_num==1 ? "<img src='icons_pack/trophy-outline.svg' width='25'> ": null )."</td>

        <td style='padding-top:25px'> <span class='$position'>$position</span> </td>

        <td style='padding-top:25px'>$age</td> 

        <td data-title='club'> 
        <figure> <a title='Get to know $club' href='clubview.php?clubid=$club_ID&club_name=$club'> <img width='60' src='$club_pic' onerror='team_imgerror(this)' alt='$club.png'></a> 
        </figure> 
        </td>     

        </tr>
        ";

        }
        echo "</table>"; //completes table structure
        } 
        else{
        echo "<div class='jumbotron'> <h3> An error occured while getting players from Core db 1</h3> </div>";
        }
        }else{
        echo "<div class='jumbotron'> <h3> An error occured while getting players from Core db 2</h3> </div>";    
        }

        ?>

            </div>
            
        </main>
    
   <?php include_once("include/footer.php"); ?>
        
    </body>    
</html>