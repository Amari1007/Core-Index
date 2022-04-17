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
                    <header><h1>Marian Marinica Casts Doubts Backroom Staff</h1></header>
                    
                    <figure>
                        <img src="../Media/News/mario-marinica.jpg" width="100%">
                        <figcaption style="padding:10px;font-weight:bold">Wanderers vs Sable Farming </figcaption>                        
                    </figure>
                    
                    <section>
                        <p>Newly appointed Malawi National Football Team Coach Marian Mario Marinica has said he will cast the net wider on the hunt for his backroom staff. Football Association of Malawi (Fam) appointed Marinica as Flames coach at its executive committee meeting in Mangochi on Saturday </p>
                        <p>He replaced Meck Mwase, who has been redeployed as the country’s national Under-23 football team coach. Fam gave the Romanian the freedom to choose his backroom staff.</p>
                        <p>Marinica said his backroom staff might include both local and expatriate coaches.“At least one of my assistants should be local as I have realised that there is skill in the local coaches. I am also considering bringing an expatriate to assist me should the budget permit me to do so,’’ he said </p>
                        <p>Marinica, who was in charge of the Flames during this year’s Africa Cup of Nations (Afcon) finals in Cameroon, said he has also engaged National Football Coaches Association (NFCA) to recommend some coaches for possible inclusion in the technical panel.
                        ’’I have not ruled out coach Mwase or Patrick Mabedi and others. I have also asked the coaches association to suggest some names for me to consider.
                        “One of the skills that I want the proposed coaches to possess is that they should be computer literate. They should also be capable of helping me with player analysis and video monitoring,” he said.</p>
                        <p>In a bid to help the Flames perform at the Afcon finals, Fam hired Clwyd Jones as psychologist whereas Ged Searson was deployed as a data analyst. The two Britons returned home thereafter.
                        NFCA General Secretary Davie Mpima confirmed that Marinica had approached them.
                        “Our role is to propose names of coaches in line with what he wants. He will be the one to make the final decision,” Mpima said.</p>

                        <p>Mwase had Lovemore Fazili and Bob Mpinganjira as his assistants.
                        Fazili has a running contract with Fam until April next year whereas Mpinganjira did not sign any contract with the association.
                        The Flames are expected to compete in the 2023 Afcon qualifiers scheduled for June.
                        </p>

                    </section>
                    
                </article>
            </div>            
                        
        </main>

   <?php require_once("include/footer.php"); ?>
    
</body>    
</html>