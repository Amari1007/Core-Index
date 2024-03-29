<?php
session_start();
require("include/coreDB.php");

if(!isset($_GET['code'])){
    $conn->close();
    header('Location:leagues.php?error=invalid league');    
    exit();
}
else{
    extract($_GET);
	if( isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ){
		require("include/last_activity.php");
	}
}

?>

<!DOCTYPE html>
<html lang="en">
    <?php     
    require_once("include/headCode.php") ;?>    
    <head>
        <style>
            #league_table table th, #league_table table td{
                text-align: left;           
            }
            
        </style>
    
    </head>

    <body>
    
    <?php require_once("include/header.php") ?>
        
    <?php require_once("include/league_navtab.php") ?> 
        
    
    <main class="container">
        <h2>League Table 2022 <span style="font-size:14px">&bull; Last updated on 11-07-2022 &bull;</span></h2>
        
        <div id="league_table" class="table-responsive">
            
        <?php 
    
        if($result = $conn->query(" select *,CONCAT(win*3 + draw*1) AS points, CONCAT(gf-ga) as gd,CONCAT(win+draw+loss) AS played from `mw-tsl-table_22-23` ORDER BY points*1 DESC,gd*1 DESC,gf*1 DESC ")){ 
            if($result->num_rows > 0){
                echo "<table class='table table-striped'>
                      <thead>
                      <tr> 
                      <th style='width:5%'>Pos</th> 
                      <th style='width:15%'>Team</th> 
                      <th style='width:10%'></th> 
                      <th style='width:10%'>P</th> 
                      <th style='width:10%'>W</th> 
                      <th style='width:10%'>D</th> 
                      <th style='width:10%'>L</th> 
                      <th style='width:15%'>GD</th> 
                      <th style='width:15%'>Pts</th> 
                      </tr>
                      </thead>
                      ";
                
                    $pos=1;
                    while($row = $result->fetch_assoc()){
                    extract($row);
                    
                    //code below  checks if club is in clubs table and creates a link if true
                    if($clubdata = $conn->query("SELECT club_ID,club_name,club_pic FROM clubs WHERE club_name LIKE '%$club%' LIMIT 1 ")){
                        if($clubdata->num_rows>0){
                            while($rowclubdata = $clubdata->fetch_assoc()){
                                extract($rowclubdata);
                                //if club is found create a link from its name
                                $club = "<a href='clubview.php?clubid=$club_ID&club_name=$club_name'>$club</a>";
                            }
                    
                        }else{
                            //if club is not found from its name
                            $club=$club;
                            $club_pic=" ";
                        }
                    
                    }  else{
                        $club='error';
                    }
                        
                        
                    $gd = $gf-$ga;    
                    echo "
                     <tr> <td style='font-weight:bold;font-size:16px;'>$pos</td> <td>$club</td> <td> <img src='$club_pic' class='img-circle' width='45' onerror='team_imgerror(this)' alt='N/a'> </td> <td>$played</td> <td>$win</td> <td>$draw</td> <td>$loss</td> <td>$gd</td> <td>$points</td>
                     </tr>      
                         ";    
                    $pos+=1;
        }  
                echo "</table>";
    }else{
                echo "<div class='jumbotron'>Fatal Error 2</div>";
            }    
}else{
            echo "<div class='jumbotron'>Fatal Error 1</div>";
        }

$conn->close();
        
        ?>
        </div>

    </main>
        
   <?php include_once("include/footer.php"); ?> 
    
</body>    
</html>