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
        
        <div id="bars"> 
            <div class="jumbotron">
            <h3>Nothing to see here yet...</h3>
            </div>
        </div>
        
        <script>
            $(document).ready(function(){
                
                $("#vote-block-1").click(function(){
                    //deletes pre-vote bar
                    $(this).remove();
                    
                    $.post(
                        "include/get_votes.php",
                        {
                            match_ID:<?php echo $match_ID ?>,
                            user_name:"<?php echo $_SESSION['user_name'] ?>",
                            selected:1
                        },
                        function(data,status,obj){
                            
                            if(status=='success'){ 
                                
                                if( data=='Fatal error 1' || data=='Fatal error 2' || data=='Fatal error 3' ){
                                   $(".teams").append("<div class='jumbotron'> <h2>Oops.... Could't get votes: "+data+"</h2> </div>");
                                    
                                   }else{
                                       //display vote results bar in '.teams' if OK
                                       $(".teams").append(data);
                                   }
                
                               }else{
                                   $(".teams").append("<div class='jumbotron'> <h2>Oops.... Could't get votes: Unspecified error</h2> </div>"); 

                               }
                        }
                        
                    );
                
            });
                
        });
            
        </script>
        
        </main>
        
   <?php include_once("include/footer.php"); ?>

    </body>    
</html>+