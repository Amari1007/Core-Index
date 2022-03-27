<?php
session_start();

require_once("include/coreDB.php");

if(!isset($_GET['code'])){
    $conn->close();
    header('Location:leagues.php?error=invalid league');    
    exit();
}
else{
    extract($_GET);
}

?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once("include/headCode.php") ;?>    
    <head>
    <link rel="stylesheet" type="text/css" href="css/league_selected_table/style.css"/>
    </head>

    <body>
    
    <?php require_once("include/header.php") ?>
        
    <?php require_once("include/league_navtab.php") ?> 
        
    
    <main class="container">
        
        <div id="league_table" class="table-responsive">
            
        <?php 
    
        if($result = $conn->query("select *, CONCAT(gf-ga) as gd, CONCAT(win*3 + draw*1) AS points,CONCAT(win+draw+loss) AS played from `mw-tsl-table`  ORDER BY points DESC,gd DESC ")){ 
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
                    
                    //code below  checks if club is in database and creates a link if true
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
                     <tr> <td>$pos</td> <td>$club</td> <td> <img src='$club_pic' class='img-circle' width='45' onerror='team_imgerror(this)' alt='N/a'> </td> <td>$played</td> <td>$win</td> <td>$draw</td> <td>$loss</td> <td>$gd</td> <td>$points</td>
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