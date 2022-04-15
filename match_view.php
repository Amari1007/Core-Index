<?php
session_start();

require_once("include/coreDB.php");

if(!isset($_GET['match_ID'])){
    header("Location:leagues.php");
}
else{
    extract($_GET);
}

?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once("include/headCode.php") ;?>    
    <head>
    <link rel="stylesheet" type="text/css" href="css/league_selectedphp/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/matchviewphp/style.css"/>
    
    <script>
        $(document).ready(function(){
            //the code below will change the styling of the buttons in #teams

            //default styling
            $('#match_stats').css({"background-color":"#e8491d","color":"white","border":"0px solid white"});

            $('#match_stats').click(function(){
               $(this).css({"background-color":"#e8491d","color":"white"});
               $('#line_ups').css({"background-color":"white","color":"black","border":"0px solid white"});
            });

             $('#line_ups').click(function(){
               $(this).css({"background-color":"#e8491d","color":"white"});
               $('#match_stats').css({"background-color":"white","color":"black","border":"0px solid white"});
            });

        });        

    </script>
    
    <script>
        $(document).ready(function(){
            $('#bars').load("include/match_facts_retrieve.php?match_ID=<?php echo $match_ID?>");
            
            $('#match_stats').click(function(){
                $('#bars').load("include/match_facts_retrieve.php?match_ID=<?php echo $match_ID?>");
            })
            
            $('#line_ups').click(function(){
                $('#bars').load("include/match_lineups_retrieve.php?match_ID=<?php echo $match_ID?>");
            })
               
        });
     </script>
    </head>

    <body>    
        
    <?php require_once("include/header.php") ?>
        
    <?php require_once("include/league_navtab.php") ?>
    
    <main class="container">  
        <?php 
            require("include/retrieve_match_header.php");
        ?>   
        
        <div class="container" id="vote-block">
            <?php 
                require("include/check_vote_history.php");
            ?>   
        </div>
        
        <script> 
            $(document).ready(function(){
               $("div #vote-block-1 .btn").click(function(){    
                   
                   //determine button clicked
                   var vote_clicked = $(this).val();
                   
                   //default vote values
                   var home_add = 0; 
                   var draw_add = 0;
                   var away_add = 0;                   
                   
                   //assign vote based on button clicked
                   if(vote_clicked == "home"){
                          alert("home "+draw_add);
                          home_add = 1;
                      }
                   else if(vote_clicked == "draw"){
                           alert("draw");
                           draw_add = 1;
                   }
                   else if(vote_clicked == "away"){
                           alert("away");
                           away_add = 1;
                   }
                   
                   //send vote to database
                   $.post(
                       "include/get_votes.php",
                       {
                           match_ID: <?php echo $match_ID;  ?>,
                           user_id: <?php echo $_SESSION['user_id']; ?>,
                           user_name: " <?php echo $_SESSION['user_name']; ?> ",
                           home_add: home_add,
                           draw_add: draw_add,
                           away_add: away_add
                           
                       },
                       function(data,status,obj){
                           if(status=='success'){
                              $("#vote-block").html(data);
                               location.reload();//reload page every time after vote
                                  
                           }else{
                              $("#vote-block").html("<h3>An error occured</h3>");
                              
                           }
                       
                       }
                       
                   );
                   
               });
                
            });
        
        </script>
        
        <?php 
            require("include/retrieve_match_info_box.php");
        ?> 
        
    </main>
        
   <?php include_once("include/footer.php"); ?>

    </body>    
</html>