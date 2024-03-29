<?php
session_start();
require("include/coreDB.php");

if(!isset($_GET['code'])){
	$conn->close();
    header('Location:leagues.php');
}else{
    extract($_GET);
	if( isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ){
		require("include/last_activity.php");
	}
}

?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once("include/headCode.php") ;?>    
    <head>
    <link rel="stylesheet" type="text/css" href="css/league_selected_fixturesphp/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/league_selectedphp/style.css"/>
    </head>

    <body>
    
    <?php require_once("include/header.php") ?>
        
    <?php require_once("include/league_navtab.php") ?>
        
        <script>
            $(document).ready(function(){                
                $('#default').css({"background-color": "lightgrey"});         
                    
                var month = $('#default').val();
                var fixtures = "<?php echo $fixtures; ?>";
                var league = "<?php echo $league_name; ?>"; 
                var code = "<?php echo $code; ?>"; 

                $.post(
                    "include/show_league_fixtures.php",
                    {
                        month:month,
                        fixtures:fixtures,
                        league: league,
                        code: code
                    },
                    function(data,status,ob){
                    if(status=='success'){
                       $("#display").html(data);
                       }
                        else{
                        $("#display").html("<div class='jumbotron'> <h2>Couldn't get fixtures</h2> </div>");
                        }

                    }                    
                );
                
                // code below retrieves fixtures from the database according to the month selected
                $("main button").click(function(){  
                          
                    $('main button').css({"background-color": "white"});
                    $(this).css({"background-color": "lightgrey"});
                        
                    
                    var month = $(this).val();
                    var fixtures = "<?php echo $fixtures; ?>";
                    var league = "<?php echo $league_name; ?>";  
                    var code = "<?php echo $code; ?>";  
                    
                    //fixtures are retrieved from the show_league_fixtures.php file
                    $.post(
                        "include/show_league_fixtures.php",
                        {
                            month:month,
                            fixtures:fixtures,
                            league: league,
                            code: code
                        },
                        function(data,status,ob){
                        if(status=='success'){
                           $("#display").html(data);
                           }
                            else{
                                //display error if unsuccessful
                            $("#display").html("<div class='jumbotron'> <h2>Couldn't get fixtures</h2> </div>");
                            }
                           
                        }                    
                    );
                });
            });
        
        </script>
    
        <main class="container-fluid">
            
        <div id="dates">
             <button class="btn" value="20%" id="default"><strong>ALL</strong></button>
             <button class="btn" value="2021-01%"><strong>JAN</strong> <br/> 2021</button>
             <button class="btn" value="2021-02%"><strong>FEB</strong> <br/> 2021</button>
             <button class="btn" value="2021-03%"><strong>MAR</strong> <br/> 2021</button>
             <button class="btn" value="2021-04%"><strong>APR</strong> <br/> 2021</button>
             <button class="btn" value="2021-05%"><strong>MAY</strong> <br/> 2021</button>
             <button class="btn" value="2021-06%"><strong>JUN</strong> <br/> 2021</button>
             <button class="btn" value="2021-07%"><strong>JUL</strong> <br/> 2021</button>
             <button class="btn" value="2021-08%"><strong>AUG</strong> <br/> 2021</button>
             <button class="btn" value="2021-09%"><strong>SEP</strong> <br/> 2021</button>
             <button class="btn" value="2021-10%"><strong>OCT</strong> <br/> 2021</button>
             <button class="btn" value="2021-11%"><strong>NOV</strong> <br/> 2021</button>
             <button class="btn" value="2021-12%"><strong>DEC</strong> <br/> 2021</button>  
             <button class="btn" value="2022-01%"><strong>JAN</strong> <br/> 2022</button>  
             <button class="btn" value="2022-02%"><strong>FEB</strong> <br/> 2022</button>  
             <button class="btn" value="2022-03%"><strong>MAR</strong> <br/> 2022</button>  
             <button class="btn" value="2022-04%"><strong>APR</strong> <br/> 2022</button>  
             <button class="btn" value="2022-05%"><strong>MAY</strong> <br/> 2022</button>  
             <button class="btn" value="2022-06%"><strong>JUN</strong> <br/> 2022</button>  
             <button class="btn" value="2022-07%"><strong>JUL</strong> <br/> 2022</button>  
             <button class="btn" value="2022-08%"><strong>AUG</strong> <br/> 2022</button>  
             <button class="btn" value="2022-09%"><strong>SEP</strong> <br/> 2022</button>  
             <button class="btn" value="2022-10%"><strong>OCT</strong> <br/> 2022</button>  
        </div>
       
            <div id="display">
            <!--Data here from include/show_league_fixtures.php file -->
                
            </div>
            
        </main>

   <?php include_once("include/footer.php"); ?>
    
</body>    
</html>