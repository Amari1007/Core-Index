<?php
session_start();
require("include/coreDB.php");

if(!isset($_GET['code'])){
	$conn->close();
    header('Location:leagues.php');
}
else{
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
        <script>
            document.title = " <?php echo $league_name ?> ";
        </script>
        
        <link rel="stylesheet" href="css/league_selectedphp/style.css"/>
        
        <script>
        $(document).ready(function(){
            $("#team-list h4").click(function(){
                $("#team-list ul").fadeToggle(500);
            });
            
        });
        
    </script>
    
    </head>

    <body>
    
        <!-- code below displays the main navigation tab -->
        <?php require_once("include/header.php") ?>
        

        <!-- code below displays the league navigation tab -->
        <?php require_once("include/league_navtab.php") ?>    
        
        
        <!-- code below shows advertisements -->
        <div id="ads">
            <p>Advertisement</p>
            
            <script>
                var counter = 0;
                var pic = ["Media/advertisements/wsb_ad.jpg","Media/advertisements/deposit-button.jpg","Media/advertisements/premierbet.jpg"];
                var path = ["https://m.wsbetting.co.mw/","https://m.wsbetting.co.mw/","http://www.premierbet.mw/login-page/"]
                function myfunction(x){
                    setTimeout(function(){ 
                        if(counter>=pic.length){
                           counter=0;
                           }    
                        
                        x.src = pic[counter];
                        document.getElementById("adv_div").href = path[counter];
                        counter++;
                        
                    },4000);
                }
            </script>
            
            <a id="adv_div" href="http://www.premierbet.mw/login-page/"><img src="Media/advertisements/premierbet.jpg" width="100%" onload="myfunction(this)"></a>
        </div>
        
        
    <main class="container-fluid">
        
        <!-- code below shows the clubs in the league -->
        <div id="sidebar"> 
            <figure style='border:0px solid black'> 
            
            <?php
                if($get_pic = $conn->query("SELECT league_id,logo FROM competitions_tournaments where code='$code' ")){
                    if($get_pic->num_rows>0){
                        while($league_pic = $get_pic->fetch_assoc()){
                            extract($league_pic);
                            echo "<img src='$logo' width='170' alt='$league_name.jpg'>";
                        }
                    }
                }else{
                    echo "<div class='jumbotron'> No Data available 1</div>";
                }            
            ?>
                
            </figure>
            
            <div id="team-list">
                
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
            
        </div> 
                
        <div id="main_content">
            
        <div class="row">
            
            <!-- code below shows the latest news content from the league -->
            <!-- THESE WILL BE UPDATED PERIODICALLY -->
            <div class="col-sm-7">
                <section class="league_news">
                    
                    <article>
                        <header>
                            <a href="news/marian-marinica-casts-net-wider-on-backroom-staff.php?code=<?php echo $code; ?>&league_name=<?php echo $league_name; ?> ">                    
                                <h3>Marian Marinica Casts Net Wider On Backroom Staff</h3>
                                <img src='Media/News/mario-marinica.jpg' width='100%' onerror='article_imgerror(this)' alt='image na'>
                            </a>
                        </header>

                        <aside> <span class='glyphicon glyphicon-tag'></span>Times Sports</aside>
                    </article>
                    
                    <article>
                        <header>
                            <a href="news/4-arrested-for-gate-fraud.php?code=<?php echo $code; ?>&league_name=<?php echo $league_name; ?> ">                    
                                <h3>4 Arrested For Gate Fraud As ‘Blues’ March On</h3>
                                <img src='Media/News/wanderers-sable-farming-nyangulu-780x405.jpg' width='100%' onerror='article_imgerror(this)' alt='image na'>
                            </a>
                        </header>

                        <aside> <span class='glyphicon glyphicon-tag'></span>Times Sports</aside>
                    </article>
                    
                    <section class="external_content">
                        <h3 style="background-color:black;color:white;width:98%;padding:15px;border-radius:5px">External Links</h3>
                    
                    <article title="Open New Tab">
                        <header>
                            <a href="https://www.mbc.mw/news/sports/item/10679-bullets-drop-8-veteran" target="_blank">                   
                                <h3>Bullets Drop 8 Veterans</h3>
                                <img src='' onerror='article_imgerror(this)' width="100%" alt='image na'>
                            </a>
                        </header>

                        <aside> <span class='glyphicon glyphicon-tag'></span>MBC Sports</aside>
                    </article>
                    
                    <article title="Open New Tab">
                        <header>
                            <a href="https://times.mw/big-bullets-cruise-to-the-top/" target="_blank">                   
                                <h3>Big Bullets Cruise To The Top</h3>
                                <img src='Media/News/big-bullets-631x405.jpg' onerror='article_imgerror(this)' width="100%" alt='image na' loading="lazy">
                            </a>
                        </header>

                        <aside> <span class='glyphicon glyphicon-tag'></span>Times Sports</aside>
                    </article>
                    
                    </section>
                    
                </section>            
            </div>
            
            <!-- league table,  fixtures, top scorers -->
            <div class="col-sm-5" style="border:0px solid black">
                 <section class="league_content"> 
                     
                     <!-- code below shows the league log table -->
                     <section class="league_table">
                <h4><?php echo $league_name ?> Table</h4>
               
        <div class="table-responsive">
        <?php 

        if($result = $conn->query("select *,CONCAT(win*3 + draw*1) AS points, CONCAT(gf-ga) as gd,CONCAT(win+draw+loss) AS played from `mw-tsl-table_22-23` ORDER BY points*1 DESC,gd*1 DESC,gf*1 DESC LIMIT 8")){
        if($result->num_rows > 0){
        echo "<table class='table table-hover table-responsive' style='width:100%; margin:auto'>
              <thead>
              <tr> 
              <th style='width:5%'>Pos</th> 
              <th style='width:40%'>Team</th> 
              <th style='width:40%'></th> 
              <th style='width:5%'>P</th> 
              <th style='width:5%'>Gd</th> 
              <th style='width:5%'>Pts</th> 
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
        echo "
        <tr> <td>$pos</td> <td style='text-align:left'>$club</td> <td> <img src='$club_pic' class='img-circle' width='30' onerror='team_imgerror(this)' alt='N/a'> </td> <td>$played</td> <td>$gd</td> <td>$points</td></tr>      
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
            </section>
    
                     <!-- code below shows the latest fixtures in the league -->
                     <section class="league_fixtures">
                <h4>Latest Scores</h4>
            <?php 
                
            require("include/coreDB.php"); //include this because DB connection is closed above
 
            if($result=$conn->query("SELECT * FROM `fixtures` where status='report' OR status='played' ORDER BY DATE desc limit 5 ")){
            if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
            extract($row);                
                
                $date = date("d M, y",strtotime($date) ); //converts date milliseconds to string date
                $time = strtotime($time); //converts to time value if original value is text
                $time = date("H:i",$time); // converts to string Hour:Minute time format
                $scores = " "; //USED LATER IN SCRIPT
                
            if($status==='live'){
                $scores = "
                <div id='scores'>
                <a href='match_view.php?match_ID=$match_ID&code=$competition_code&league_name=$competition'>
                    <div style='float:left;width:49%;text-align:center;background-color:#2866f6;font-weight:bold;color:white;padding:3px;'>$home_goals</div>

                    <div style='float:right;width:50%;text-align:center;background-color:#2866f6;font-weight:bold;color:white;padding:3px;'>$away_goals </div>
                </a>
                <span style='text-align:center;display:block;color:#2866f6;font-size:13px'>&bull; live</span>
                </div>                
                ";
            }
            else if($status==='upcoming'){
                $scores = "
                <div id='scores'>
                <a>
                    <div style='width:100%;text-align:center;background-color:#dbdbdb;font-weight:bold;color:black;padding:3px;overflow:hidden;'>$time</div> 
                </a>
                <span style='text-align:center;display:block;color:black;font-size:13px'></span>
                </div>
                "; 
            }
            else if($status=='played'){ 
                $scores = "                
                <div id='scores'>
                <a>
                    <div style='float:left;width:49%;text-align:center;background-color:#ffd230;font-weight:bold;color:black;padding:3px;'>$home_goals</div>

                    <div style='float:right;width:50%;text-align:center;background-color:#ffd230;font-weight:bold;color:black;padding:3px;'>$away_goals </div>
                </a>
                <span style='text-align:center;display:block;color:black;font-size:12px'>FT</span>
                </div>    
                ";
            }
            else if($status=='report'){                
                $scores = "
                <div id='scores'>
                <a href='match_view.php?match_ID=$match_ID&code=$competition_code&league_name=$competition'>
                    <div style='float:left;width:49%;text-align:center;background-color:#ffd230;font-weight:bold;color:black;padding:3px;'>$home_goals</div>

                    <div style='float:right;width:50%;text-align:center;background-color:#ffd230;font-weight:bold;color:black;padding:3px;'>$away_goals</div>
                </a>
                <span style='text-align:center;display:block;color:black;font-size:12px'>FT</span>
                </div> 
                ";
            } 
			else if($status=='postponed'){                
                $scores = "
                <div id='scores'>
                <a>
                    <div style='width:100%;text-align:center;background-color:#dbdbdb;font-weight:bold;color:black;padding:3px;overflow:hidden;'>TBD</div> 
                </a>
                <span style='text-align:center;display:block;color:black;font-size:13px'>Postponed</span>
                </div> 
                ";
            }
            else if($status=='disabled'){
                $scores = "                
                <div id='scores'>
                <a>
                    <div style='float:left;width:49%;text-align:center;background-color:#ffd230;font-weight:bold;color:black;padding:3px;'>$home_goals</div>

                    <div style='float:right;width:50%;text-align:center;background-color:#ffd230;font-weight:bold;color:black;padding:3px;'>$away_goals </div>
                </a>
                <span style='text-align:center;display:block;color:black;font-size:12px'>FT</span>
                </div>    
                ";                
            }
            else{
                $scores = "                
                <div id='scores'>
                <a>
                    <div style='width:100%;text-align:center;background-color:#dbdbdb;font-weight:bold;color:black;padding:3px;overflow:hidden;'>$time</div> 
                </a>
                <span style='text-align:center;display:block;color:black;font-size:13px'></span>
                </div>
                ";
            }                  
               
            //code below creates a new table every time
            echo " 
            <span style='font-weight:bold;font-size:12px;font-family:helvetica;'>$date</span>
            
            <table class='table table-hover table-responsive' style='width:100%; margin:auto'>
            <tr>
            <td style='width:40%'>$home_team</td> 
            <td style='width:20%' title='See Match Details'>$scores</td> 
            <td style='width:40%'>$away_team</td> 
            </tr>  
            </table>   
            ";              
            } echo " <div> <a href='league_selected_fixtures.php?league_name=$league_name&fixtures=$code-fixtures&code=$code' >See full fixture list &gt&gt&gt</a> </div>";   
            }else{
            echo "<div class='jumbotron'> <h2>No fixtures available</h2> </div>";
            }    
            }
                

            $conn->close(); //closed connection to database here
            ?>
            </section>

                     <!-- code below shows the top scorers in the league -->
                     <section class="table-responsive league_top_scorers">
                <h4>League Top Scorers</h4>
                <?php 
                
                 require("include/coreDB.php"); //include this because DB connection is closed above
                
                if($result=$conn->query("SELECT * FROM `players` where league_code='$code' or league='$league_name' order by goals desc limit 5")){
                if($result->num_rows > 0){
                    
                    //layout intial table structure
                echo "
                <table class='table table-hover' style='width:100%; margin:auto'>
                <thead> 
                <tr>
                <th style='width:20%'>Name</th> <th style='width:25%'></th> <th style='width:25%'></th> <th style='width:15%'>G</th> <th style='width:15%'>A</th>
                </tr>  
                </thead>
                ";
                    
                while($row = $result->fetch_assoc()){                    

                 extract($row);  
                //code below will get club pic associated with player club
                 if($clubdata = $conn->query("SELECT club_pic FROM clubs WHERE club_name LIKE '%$club%' LIMIT 1 ")){
                     if($clubdata->num_rows>0){
                         while($rowclubdata = $clubdata->fetch_assoc()){
                            extract($rowclubdata);
                         }
                     }else{
                         $club_pic='';
                     }
                 }else{
                     $club_pic='error 2';
                 }

                echo "
                <tr>            
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
                
                <td style='width:70%;text-align:left'><a class='player_id_$player_ID' style='cursor:pointer' title='Get to know $fname $lname'>$fname $lname</a> 
                </td>                 
                <td> <img src='$player_pic' class='img-circle' width='30' onerror='player_imgerror(this)' alt='N/a'> </td> 
                <td> <img src='$club_pic' class='img-circle' width='30' onerror='team_imgerror(this)' alt='N/a'> </td> 
                <td style='width:15%'>$goals</td>
                <td style='width:15%'>$assists </td>                  
                </tr>   

                ";
                        }
                    echo "</table>"; //completes table structure
                    
                    echo"<div> <a href='league_selected_player_rankings.php?code=$code&league_name=$league_name'>See more &gt&gt&gt</a> </div>";
                    
                    }else{
                    echo "<div class='jumbotron'><h3>Data currently unavailable</h3></div>";
                }
                }else{
                    echo "<div class='jumbotron'><h3>Data currently unavailable</h3></div>";
                }
                
                $conn->close(); //closed connection to database here

                ?>
                
            </section>
            
                </section>
            </div>
        
        </div>
        </div>
        
        </main> 
            
   <?php include_once("include/footer.php"); ?>
    
</body>    
</html>