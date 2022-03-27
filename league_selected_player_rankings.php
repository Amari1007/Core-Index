<?php
session_start();

require_once("include/coreDB.php");

if(!isset($_GET['code'])){
    header('Location:leagues.php');
}
else{
    extract($_GET);
}

?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once("include/headCode.php") ;?>    
    <head>
    <link rel="stylesheet" type="text/css" href="css/league_selected_player_rankingsphp/style.css"/>
    </head>

    <body>
    
    <?php require_once("include/header.php") ?>
  
    <?php require_once("include/league_navtab.php") ?>     
    
        <main class="container">
            
            <section class="league_rankings">
                <button class="btn btn-success" id="table_changer" value="goals">Top Scorers Table</button>
                <h4>League Top Scorers</h4> 
                
                <script>
                    $(document).ready(function(){
                        $.post("include/retrieve league_selected_player_rankings.php",
                                   {x:'goals',
                                    league:'<?php echo $league_name ?>',
                                    code:'<?php echo $code ?>'
                                   },
                                   function(data){
                                $('#display').html(data)}
                            ); 
                        
                        $('#table_changer').text('Assists Table');
                        $('#table_changer').attr('value','assists');
                            
                        $('#table_changer').click(function(){
                            
                            if($(this).val()=='goals'){
                                
                                 $('.league_rankings h4').text('League Top Goal Scorers'); //changes heading after clicking button
                                     
                                 $.post("include/retrieve league_selected_player_rankings.php",
                                   {x:$(this).val(),
                                    league:'<?php echo $league_name ?>',
                                    code:'<?php echo $code ?>'
                                   }
                                   ,function(data){
                                $('#display').html(data);
                            }                            
                            
                            );
                               $(this).text('Assists Table');
                                $(this).attr('value','assists');
                               }
                            else if($(this).val()=='assists'){
                                 $('.league_rankings h4').text('Most Assists (Top Playmakers)');
                                 $.post("include/retrieve league_selected_player_rankings.php",
                                   {x:$(this).val(),
                                    league:'<?php echo $league_name ?>',
                                    code:'<?php echo $code ?>'
                                   },function(data){
                                $('#display').html(data);
                            }                            
                            
                            );
                                $(this).text('Top Scorers Table');
                                $(this).attr('value','goals');
                                    }
                        });
                        
                    });
                    
                </script>
              
                <div id="display" class="table-responsive">
                 <!-- content will come here-->
                </div>
                
            </section>
        </main>
    
   <?php include_once("include/footer.php"); ?>
        
    </body>    
</html>