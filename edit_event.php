<?php
session_start();

if(isset($_SESSION['user_id']) && $_SESSION['user_type']==="admin" && isset($_SESSION['user_name']) ){
    
}else{
    header("location:sign_in.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once("include/headCode.php") ;?>    
    <head>
        <script>
            document.title = "Developers: Edit Event";
        </script>
        <link rel="stylesheet" href="css/edit_eventphp/style.css">
    </head>

    <body>
    <?php require_once("include/header.php") ?>
    <script>
            $(document).ready(function(){                
                $('#default').css({"background-color": "lightgrey"});         
                    
                var month = $('#default').val();
                $.post(
                    "include/show_league_fixtures.php",
                    {
                        month:month,
                        code:"mw-tsl"
                    },
                    function(data,status,ob){
                    if(status=='success'){
                       $("#match_event").html(data);
                       }
                        else{
                        $("#match_event").html("<div class='jumbotron'> <h2>Couldn't get fixtures</h2> </div>");
                        }

                    }                    
                );
                // code below retrieves fixtures from the database according to the month selected
                $("#dates button").click(function(){  
                          
                    $('#dates button').css({"background-color": "white"});
                    $(this).css({"background-color": "lightgrey"});
                        
                    
                    var month = $(this).val();
                    //fixtures are retrieved from the show_league_fixtures.php file
                    $.post(
                        "include/show_league_fixtures.php",
                        {
                            month:month,
                            code:"mw-tsl"
                        },
                        function(data,status,ob){
                        if(status=='success'){
                           $("#match_event").html(data);
                           }
                            else{
                                //display error if unsuccessful
                            $("#match_event").html("<div class='jumbotron'> <h2>Couldn't get fixtures</h2> </div>");
                            }
                           
                        }                    
                    );
                });
            });
        
    </script>

    <main class="container-fluid">
        
        <div class="btn-group btn-group-justified" id="selectors" style="margin-bottom:10px">
            <h3 class="btn btn-primary" style="font:bold 18px helvetica" onclick="show_edit_event(this)">Edit Existing Event </h3>
            <h3 class="btn btn-defualt" style="font:bold 18px helvetica" onclick="show_add_event(this)">Add Event</h3>
        </div> 
    
        <div id="edit_event">
            
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

            <div id="match_event">
                <!-- Fixtures come here -->
            </div>        
            
        </div>
        
    </main>
        
    <!--code below alters edit and add buttons when clicked-->
    <script>        
        function show_add_event(x){
            $("#selectors h3").removeClass().addClass("btn btn-default");
            $(x).removeClass().addClass("btn btn-primary");
            $("#edit_event").hide(300);
            $("#add_event").show(300);
        }
        
        function show_edit_event(x){
            $("#selectors h3").removeClass().addClass("btn btn-default");
            $(x).removeClass().addClass("btn btn-primary");
            $("#add_event").hide(300);
            $("#edit_event").show(300)            
        }
        
    </script>
        
   <?php include_once("include/footer.php"); ?>
    
</body>    
</html>