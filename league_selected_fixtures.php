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
    <link rel="stylesheet" type="text/css" href="css/league_selected_fixturesphp/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/league_selectedphp/style.css"/>
    </head>

    <body>
    
    <?php require_once("include/header.php") ?>
        
    <?php require_once("include/league_navtab.php") ?>
        
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
        </div>
        
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
                       $("main").html(data);
                       }
                        else{
                        $("main").html("<div class='jumbotron'> <h2>Couldn't get fixtures</h2> </div>");
                        }

                    }                    
                );
                // code below retrieves fixtures from the database according to the month selected
                $("button").click(function(){  
                          
                    $('button').css({"background-color": "white"});
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
                           $("main").html(data);
                           }
                            else{
                                //display error if unsuccessful
                            $("main").html("<div class='jumbotron'> <h2>Couldn't get fixtures</h2> </div>");
                            }
                           
                        }                    
                    );
                });
            });
        
        </script>
    
        <main class="container">
        <!--Data here from include show_league_fixtures.php file -->
        </main>

   <?php include_once("include/footer.php"); ?>
    
</body>    
</html>