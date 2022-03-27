<?php
session_start();

require_once("include/coreDB.php");

if(!isset($_GET['article_id'])){
    $conn->close();
    header("Location:leagues.php?error=5");
    exit();
}else{
    
    extract($_GET);    
    if($getNews=$conn->query(" SELECT * FROM `$code-news` WHERE news_article_id=$article_id limit 1")){               
        if($getNews->num_rows>0){                
            while($row_getNews=$getNews->fetch_assoc()){                
                extract($row_getNews);
                
            }
        }else{
         $conn->close();
         header("Location:leagues.php?error=6");
         exit();            
        }
        
    }else{
         $conn->close();
         header("Location:leagues.php?error=7");
         exit();
    }
    
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <?php require_once("include/headCode.php") ;?>    
    <head>
    <link rel="stylesheet" type="text/css" href="css/external_newsphp/style.css"/>
    
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
            
            <div id="news_content">
                <script>
//                   $(document).ready(function(){
//                       $("#news_content").load("<?php echo $external_link ?>",function(data,status){
//                            if(status!='success'){
//                                $(this).html("<div class='jumbotron'> <h3>Nothing to see here ...yet</h3> </div>");
//                            }
//                        });                        
//                    });
                </script>
                
                <article>
                    <header style="margin-bottom:20px"><h3><?php echo " $news_article_header ($author)"; ?></h3></header>
                    
                    <?php echo isset($external_link) ? " <iframe scrolling='yes' src='$external_link' style='width:100%;height:1000px;border:0px solid white;overflow-y:hidden'></iframe>" : " <div class='jumbotron'> <h3>Nothing to see here....yet</h3> </div>" 
                    ?>                 
                    
                </article>
                
            </div>
            
        </main>
            
   <?php include_once("include/footer.php"); ?>
    
</body>    
</html>