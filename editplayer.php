<?php
session_start();
require_once("include/coreDB.php");
?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once("include/headCode.php") ;?> 
    <link type="text/css" rel="stylesheet" href="css/communityeditplayerphp/style.css">

    <body>
    <?php require_once("include/header.php") ?>

    <main class="container">
        <h3>Database List</h3>
        <div class="table-responsive">
        <?php 

        if($result = $conn->query("SELECT * FROM players ORDER BY player_ID DESC")){
            
            //execute query in database and store results in $result var
            if($result->num_rows > 0 ){
        
        echo "<table class='table table-striped'>
              <thead>
              <tr>
              <th class='player_photo' style='width:10%'>Photo</th>
              <th class='player_nationality' style='width:5%'></th>
              <th class='player_name' style='width:20%'>Name</th>
              <th class='player_position' style='width:10%'>Position(s)</th>
              <th class='player_age' style='width:10%'>Age</th>
              <th class='player_club' style='width:45%'>Club</th>              
              </tr>   
              </thead>        
        
        
        ";//establishes table structure
        
        while($row = $result->fetch_assoc()){
            
            extract($row); //extract all column names
//            $club_pic='N/a';
            if($result2=$conn->query("SELECT club_ID, club_pic FROM `clubs` WHERE club_name like '%$club%'")){
                if($result2->num_rows>0){
                    while($get_info=$result2->fetch_assoc()){
                        $club_pic = $get_info['club_pic'];
                        $club_ID = $get_info['club_ID'];
                    }
                    
                }else{
                    $club_pic='';
                    $club_ID='';
                }
            }else{
                    $club_pic='';
                    $club_ID='';
                }
            
            
            if($result3=$conn->query("SELECT nation_pic FROM `national_team` WHERE nation_name like '%$nationality%' ")){
                if($result3->num_rows>0){
                    while($get_pic=$result3->fetch_assoc()){
                        $nation_pic = $get_pic['nation_pic'];
                    }
                    
                }else{
                    $nation_pic='';
                }
            }else{
                $nation_pic='';
                }
            
                 
            echo "
            <tr> 
            
                <td> 
                <figure> 
                <a href='editplayer_view.php?playerid=$player_ID&club=$club&nationality=$nationality'> 
                <img width='70' class='img-circle' src='$player_pic' onerror='player_imgerror(this)' alt='$fname $lname.png'>
                </a>                
                </figure> 
                </td>
                
                <td style='padding-top:25px'> 
                <figure> 
                <img width='25' src='$nation_pic' onerror='team_imgerror(this)' alt='$nationality.png'>
                </figure> 
                </td>
                
                <td style='padding-top:25px'> <a href='editplayer_view.php?playerid=$player_ID&club=$club&nationality=$nationality'>$fname $lname</a>
                </td>
                
                <td style='padding-top:25px'> <span class='$position'>$position</span> </td>
                
                <td style='padding-top:25px'>$age</td> 
                
                <td data-title='club'> 
                <figure> <img class='img-circle' width='60' src='$club_pic' onerror='team_imgerror(this)' alt='$club.png'>
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