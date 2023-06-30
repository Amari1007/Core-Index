<?php
session_start();
require("include/coreDB.php");
   
if( !isset($_GET['code']) ){
    header('Location:leagues.php?error=1');
    $conn->close();
    exit();    
}else{
    extract($_GET);
	if( isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ){
		require("include/last_activity.php");
	}
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <?php require_once("include/headCode.php") ;?>    
    <head> 
    <link rel="stylesheet" type="text/css" href="css/league_selected_news/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/league_selected_transfersphp/style.css"/>    
    </head>

    <body>
    
    <?php require_once("include/header.php") ?>

    <?php require_once("include/league_navtab.php") ?> 
        
        <main class="container-fluid">
            
             <div id="sidebar">
                <figure> 

                <?php
                    if($get_pic = $conn->query("SELECT league_id,logo FROM competitions_tournaments where code='$code' ")){
                        if($get_pic->num_rows>0){
                            while($league_pic = $get_pic->fetch_assoc()){
                                extract($league_pic);
                                echo "<img src='$logo' width='170' alt='$league_name.jpg'>";
                            }
                        }
                    }            
                ?>

                </figure>
                
                <h4 title="Display <?php echo $league_name ?> teams">ALL TEAMS <img src="icons_pack\library-outline.svg" width="23"></h4>
                
               <ul>
                <?php 
                
                if($get_clubs = $conn->query("SELECT club_ID,club_pic,club_name FROM `clubs` WHERE `league_code`='$code' order by club_name asc ")){
                    if($get_clubs->num_rows>0){
                        
                        //code below sets table structure
                        echo "
                        
                            <table class='table table-hover'> 
                            <thead> <tr> <td style='width:40%'></td> <td style='width:60%'></td> </tr> </thead>";
                        
                        while($clubs = $get_clubs->fetch_assoc()){
                            extract($clubs);
                            echo " <tr> 
                                  <td> <a href='clubview.php?clubid=$club_ID&club_name=$club_name'>$club_name</a> </td>
                                  <td> <a href='clubview.php?clubid=$club_ID&club_name=$club_name'> <img class='img-circle' src='$club_pic' width='40' onerror='team_imgerror(this)' alt='$club_name.jpg'> </a> </td>
                                  </tr>  
                                  ";
                        }
                        echo "</table>"; //finishes table structure
                        
                    }else{
                        echo "<h3>No Teams Available 1</h3>";
                    }
                    
                }else{
                        echo "<h3>No Teams Available 2</h3>";
                    }
                
                ?>
                
                </ul>
                        
            </div>
            
            <div id="content"> <h3 style="background-color:black;color:white;width:69%;padding:15px;border-radius:5px">Confirmed Transfers</h3>
                
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Player</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Fee</th>
                                </tr>                            
                            </thead>
                            
                            <tbody>
                            <?php 
                            
                                if($results=$conn->query(" SELECT * FROM transfers order by date_transfered desc")){
                                    if($results->num_rows>0){
                                        while($row=$results->fetch_assoc()){
                                            extract($row);
                                            
                                            echo"
                                            <tr style='height:80px'>
                                                <td>$date_transfered</td>
                                                <td>$fname $lname</td>
                                                <td>$previous_club</td>
                                                <td>$next_club</td>
                                                <td>".(
                                                      !is_numeric($fee)?$fee:number_format($fee)." Mk"                                                      
                                                      )."</td>
                                            </tr>  
                                            ";
                                        }
                                    }
                                }
                                    
                            ?>                          
                            </tbody>
                        
                        </table>
            </div>
        
            </main>
            
   <?php include_once("include/footer.php"); ?>
    
</body>    
</html>