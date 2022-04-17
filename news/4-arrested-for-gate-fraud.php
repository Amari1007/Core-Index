<?php
session_start();

require_once("..\include\coreDB.php");

if(!isset($_GET['code'])){
    header('Location:..\leagues.php');
}
else{
    extract($_GET);
}

?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once("include/headCode.php") ;?>    
    <head>
    <link rel="stylesheet" type="text/css" href="../css/league_selectedphp/style.css"/>
    <link rel="stylesheet" href="../css/league_selected_news/style.css"> 
    </head>

    <body>
    
    <?php require_once("include/header.php") ?>
        
    <?php require_once("include/league_navtab.php") ?>
        
        <main class="container-fluid">
            
            <div id="side-bar">                 
                <figure style='border:0px solid black'> 

                <?php
                    if($get_pic = $conn->query("SELECT league_id,logo FROM competitions_tournaments where code='$code' ")){
                        if($get_pic->num_rows>0){
                            while($league_pic = $get_pic->fetch_assoc()){
                                extract($league_pic);
                                echo "<img src='../$logo' width='170' alt='$league_name.jpg'>";
                            }
                        }
                    }else{
                        echo "<div class='jumbotron'> No Data available 1</div>";
                    }            
                ?>

                </figure>

                <div id="team-list">

                    <h4 title="Display <?php echo $league_name ?> teams">ALL TEAMS <img src="..\icons_pack\library-outline.svg" width="23"></h4>

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
                                      <td> <a href='../clubview.php?clubid=$club_ID&club_name=$club_name'>$club_name</a> </td>
                                      <td> <a href='../clubview.php?clubid=$club_ID&club_name=$club_name'> <img class='img-circle' src='../$club_pic' width='40' onerror='team_imgerror(this)' alt='$club_name.jpg'> </a> </td>
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
                <h3 id='news-header-bar'>News Article</h3>
                <article>
                    <header><h1>4 Arrested For Gate Fraud As ‘Blues’ March On</h1></header>
                    
                    <figure>
                        <img src="../Media/News/wanderers-sable-farming-nyangulu-780x405.jpg" width="100%">
                        <figcaption style="padding:10px;font-weight:bold">Wanderers vs Sable Farming </figcaption>
                    </figure>
                    
                    <section>
<p>Four cashiers were Saturday arrested at Kamuzu Stadium in Blantyre for allegedly stealing gate collections amounting to K437,000.
Police arrested the five soon after TNM Super League match between Mighty Wanderers and Sable Farming.
Southern Region Police Deputy Public Relations Officer Beatrice Mikuwa confirmed the arrest of the four, saying they have been taken to Soche Police Station for further questioning. </p>
<p> “They hid the money in their panties. We have taken them to Soche Police to investigate the issue further,” she said.
Super League of Malawi (Sulom) General Secretary Williams Banda confirmed the arrest, saying the body engaged CIDs following concerns over gate revenue which Nyasa Big Bullets and Mighty Wanderers match raised. </p>
<p>“It is an ongoing exercise aimed at exposing every stakeholder involved in gate fraud. The idea is to empower the teams to get all their benefits,” he said.
Kamuzu Stadium Manager Ireen Mkoko said they were keenly following the developments.
“It is true that four cashiers have been arrested. Nobody knew that we had CIDs today,” she said.
Eyebrows have in recent times been raised over poor gate revenue.
Meanwhile, Wanderers returned at Kamuzu Stadium in fine fashion when they thrashed TNM Super League debutants Sable Farming 3-1 Saturday. </p>
<p> Elsewhere, pacesetters Blue Eagles underlined their intent for the title with a hard-fought 1-0 over Karonga United to return to the top of the table.
At Kamuzu Stadium, Sable Farming’s second-half revival proved too little and too late as they went down despite putting Wanderers to enormous pressure.
The Nomads, who had relocated to Mpira Stadium in previous matches, utilised their first-half chances to punish the rookies and eventually move to fourth position on the log table.</p>
<p>Wanderers took an early lead barely eight minutes into the game when striker Vincent Nyangulu run between Sable’s defence to separate the two teams.
The debutants then paid dearly to their awful defending when Yamikani Chester added a second goal seven minutes later after nicely being supplied in the box.
The combination of Aubrey Maloya, Nyangulu and Chester proved too good for Sable’s backline manned by Blessing Joseph, Haban Kasim, George Nyirenda and Sunganani Geoffrey, who could not withstand pressure as they conceded the third goal in the 28th minute.</p>
<p>Nyangulu was the hero as he claimed his brace after firing past Christopher Mikuwa in Sables’s goal.
As many thought the newly entrants in the league were dead and buried, Sable rejuvenate in the second half and took the game to Wanderers.
The introduction of Stain Patrick, Taniel Mhango and Chimwemwe Chinamalaya was Sable’s turning point as they put the hosts under intense pressure.</p>
<p>The Nomads failed to withstand the pressure as Mhango reduced the deficit in the 64th minute.
Sable continued exposing Wanderers’ lack of endurance and tactical discipline but the rookies could not put their chances into good use to lose vital points.
Wanderers Assistant Coach Joseph Kamwendo said collecting maximum points was there mission.
“Our performance was not satisfactory but we are happy that we have collected full points,” he said.</p>
<p>Sable Coach Joseph Malizani said his charges could have done better if they had followed their plan.
“We had our game plan. Unfortunately, we gave our counterparts a lot of room. If we had started the game the way we did in the second half, we could have been talking about different things now,” he said.
At Nankhaka Stadium, Gaddie Chirwa’s 31st minute strike helped Eagles to displace champions Nyasa Big Bullets. Eagles have 13 points from five games.</p>
<p>In a military affair, Kamuzu Barracks defeated brothers-in-arms Moyale Barracks 2-1 at Civo Stadium.
Kamuzu Barracks have gone second on the table with 10 points while Moyale are on position 13 with three points.
In another match, Mighty Tigers beat Red Lions 2-1 at Mpira Stadium.
Frank Chikufenji and Precious Chiudza scored for Tigers with Royal Bokosi scoring Lions’ consolation goal. </p>
<p>Super League will continue this afternoon with Bullets hosting Mafco at Kamuzu Stadium whereas TN Stars will date Moyale Barracks at Kasungu Stadium.
In another match, Civil Service United will take on Karonga United at Civo Stadium.
</p>

                    </section>
                    
                </article>
            </div>            
                        
        </main>

   <?php require_once("include/footer.php"); ?>
    
</body>    
</html>