<?php 
session_start();
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
                
                <section style="margin:80px 0px 100px 0px">
                    <h3 style="padding-left:150px">Latest Fixtures</h3>
                    <?php echo $fixture_list; ?>
                </section>
            
            </div> 
                                
             <!--<div id="fixture_list
            </div> -->
            
            <?php echo $player_stats ?>
            
            <?php echo $position_data ?>
            
            
            <div style="width:80%; margin:auto">
                <h3>Team Mates</h3>
                <table class="table-striped">
                    <tr><th colspan="2">Player Name</th><th>Position</th><th>Age</th><th>Score</th></tr>
        
                    <?php 
                    @$conn = new mysqli("localhost","Admin","123abc","core");
                    
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
                                <tr>
                                <td> 
                                <a href='playerview.php?playerid=$player_ID&club_name=$club&nationality=$nationality'>$fname $lname</a>
                                </td> 
                                <td> 
                                <img class='img-rounded' src='$player_pic' alt='$fname $lname.jpg' onerror='player_imgerror(this)' width='50'> 
                                <img id='nation_pic' src='$nationalpic' alt='N/A' width='30'>
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