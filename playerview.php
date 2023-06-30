<?php 
session_start();

if( isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ){
	//IF USER IS LOGGED IN UPDATE SESSION
    require("include/last_activity.php"); //will redirect if session expires
}

$raw = $_SESSION['data'];
$player_data = json_decode($raw,true);
?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once("include/headCode.php") ;?>  
    <head>
        <script src="js/anychart-core.min.js"></script>
        <script src="js/anychart-pie.min.js"></script>
        
        <script>
            document.title='<?php echo "Profile: ".$player_data['fname']." ".$player_data['lname'] ?>'
        </script>
        <link type="text/css" rel="stylesheet" href="css/playerviewphp/style.css">
    </head>    
    <body>
       <?php require_once("include/header.php") ?>
        
        <main class="container-fluid">
            
            <?php include_once("include/player_selected.php"); ?>
            
            <div>
                        
                <section>
                    <?php echo $player_info ;?>
                    <span style="color:red;"> <?php echo $error; ?></span>       
                </section>
                
                <section> 
                    <?php echo $club_info ?>                  
                </section>
                
                <section>
                    <?php echo $nation_info ?>
                </section>
                
            <div class="container-fluid">
                <h3 style="padding-left:150px">Latest Fixtures</h3>
                <?php echo $fixture_list; ?>
            </div>
            
            </div> 
                      
            <div class="container-fluid">            
                <h2 style="text-align:center;margin-bottom:50px">Performance Data</h2>

                <?php echo $player_stats ?>

                <?php echo $position_data ?>                
            </div>
            
            
            <!-- below is a table displaying team mates -->
            <div style="width:80%; margin:auto">
                <h3>Team Mates</h3>
                <table class="table-striped">
                    <tr><th colspan="2">Player Name</th><th>Position</th><th>Age</th><th>Rating</th></tr>
        
                    <?php 
                    require_once("include/coreDB.php");
                    
                    //output players from player table matching club name
                    if($result = $conn->query("SELECT * FROM players WHERE club='$club_name' and player_ID!=$playerid ")){
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