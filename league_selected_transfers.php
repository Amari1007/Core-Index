<?php
session_start();

require_once("include/coreDB.php");

   
if(!isset($_GET['code']) && empty($_GET['code'])){
    header('Location:leagues.php?error=1');
    $conn->close();
    exit();    
}else{
    extract($_GET);
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <?php require_once("include/headCode.php") ;?>    
    <head> 
    <link rel="stylesheet" type="text/css" href="css/league_selected_news/style.css"/>
    
    </head>

    <body>
    
    <?php require_once("include/header.php") ?>

    <?php require_once("include/league_navtab.php") ?> 
        
        <main class="container-fluid"> 
               
            <div id="sidebar"> 
            <figure style='border:0px solid black'> 
            
            <?php
                if($get_pic = $conn->query("SELECT league_id,logo FROM leagues where code='$code' ")){
                    if($get_pic->num_rows>0){
                        while($league_pic = $get_pic->fetch_assoc()){
                            extract($league_pic);
                            echo "<img src='$logo' width='170' alt='$league_name.jpg'>";
                        }
                    }
                }            
            ?>
                
            </figure>
            
            <div id="team-list">
                
                <h4 title="Display <?php echo $league_name ?> teams">ALL TEAMS <img src="icons_pack\library-outline.svg" width="23"></h4>
                
                <ul>
                <?php 
                
                if($get_clubs = $conn->query("SELECT club_ID,club_pic,club_name FROM `$code-teams` order by club_name asc ")){
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
            </div> 
            
            <div id="content">
                <h3 style="background-color:black;color:white;width:69%;padding:15px;border-radius:5px">Confirmed Transfers</h3>
                <div id="news_content">
                    
                    <section class="table-responsive">
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
                    </section>
 
                </div>
                
                <div id="league_table">
                <div class="table-responsive">
        <?php 

        if($result = $conn->query("select *,CONCAT(win*3 + draw*1) AS points,CONCAT(win+draw+loss) AS played from `$code-table` ORDER BY points DESC LIMIT 8")){
        if($result->num_rows > 0){
        echo "<table class='table table-hover table-responsive' style='width:100%; margin:auto'>
              <thead>
              <tr> 
              <th style='width:5%'>Pos</th> 
              <th style='width:40%'>Team</th> 
              <th style='width:40%'></th> 
              <th style='width:6%'>P</th> 
              <th style='width:9%'>Pts</th> 
              </tr></thead>
        ";

        $pos=1;
        while($row = $result->fetch_assoc()){
            //get club data from league table 
            extract($row);
            
        //check for club in clubs table and retrieve club_ID
        if($clubdata = $conn->query("SELECT club_ID,club_name,club_pic FROM clubs WHERE club_name LIKE '%$club%' LIMIT 1 ")){
            if($clubdata->num_rows>0){
        while($rowclubdata = $clubdata->fetch_assoc()){
              extract($rowclubdata);
            //if club is found create a link from its name
            $row['club'] = "<a href='clubview.php?clubid=$club_ID&club_name=$club_name'>$club</a>";
            }
       
            }else{
                $row['club']=$club;
            }
        }else{
            $club='error';
        }
           
    //output league table data
    extract($row);
        $gd = $gf-$ga;    
        echo "
        <tr> <td>$pos</td> <td style='text-align:left'>$club</td> <td> <img src='$club_pic' class='img-circle' width='30' onerror='team_imgerror(this)' alt='N/a'> </td> <td>$played</td> <td>$points</td></tr>      
        ";    
        $pos+=1;
        }  
        echo "</table> <div> <a href='league_selected_table.php?league_name=$league_name&table=$code-table&code=$code'>See full table &gt&gt&gt</a> </div>";
    }else{
            echo "<div class='jumbotron'><h3>No Table Available</h3></div>";
        } 
        }else{
            echo "<div class='jumbotron'><h3>No Data Available</h3></div>";
        }

        $conn->close(); //closed connection to database here

        ?>
                </div>
                </div>
            </div>
        
        </main>
            
   <?php include_once("include/footer.php"); ?>
    
</body>    
</html>