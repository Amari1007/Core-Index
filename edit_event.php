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
            
            <h3 class="btn btn-primary" style="font:bold 18px helvetica" onclick="show_edit_event(this)">
                Edit Existing Event
            </h3>
            
            <h3 class="btn btn-default" style="font:bold 18px helvetica" onclick="show_add_event(this)">
                Add Event
            </h3>
            
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
        
        <div id="add_event" class="container">
            
            <div style="border:0px solid black">
                <h1>Add Event</h1>
                
                <form method="post" name="add_event_form" onsubmit="add_event(this)">
                    <div>
                        <label>Home team</label>
                        <input type="text" name="home_team" maxlength="30" required placeholder="Home Team..." autocomplete="off">
                    </div>
                    
                    <div>
                        <label>Away team</label>
                        <input type="text" name="away_team" maxlength="30" required placeholder="Away Team..." autocomplete="off">
                    </div>
                    
                    <div>
                        <label>Date</label>
                        <input type="date" name="date" required>
                    </div>
                    
                    <div>
                        <label>Time</label>
                        <input type="time" name="time" required>
                    </div>
                    
                    
                    <div>
                        <label>Venue</label>
                        <input type="text" name="venue" maxlength="30"  placeholder="Match Venue" required autocomplete="off">
                    </div>
                    
                    
                    <div>
                        <label>Referee</label>
                        <input type="text" name="referee" maxlength="30" required placeholder="Match Referee" autocomplete="off">
                    </div>
                    
                    <div>
                        <input type="reset" value="Reset" class="btn btn-danger" style="color:white;padding:10px;width:70px">
                    </div>
                    
                    <div>
                        <input type="submit" class="btn btn-success" style="color:white;padding:10px;width:70px">
                    </div>
                    
                    <script>
                        
                        function add_event(x){
                            
                            var response = true;
                            
                            if( confirm("Submit this data") ){
                                //if user confirms
                                                            
                            var home_team = x.home_team.value;
                            var away_team = x.away_team.value;
                            var date= x.date.value;
                            var time = x.time.value;
                            var referee = x.referee.value;
                            var venue = x.venue.value;
                                                        
                            $(document).ready(function(){
                                
                                $.post(
                                    "include/add_event.php",
                                    {
                                        user_id:<?php echo $_SESSION['user_id']; ?>,
                                        user_type:"<?php echo $_SESSION['user_type']; ?>",
                                        user_name:"<?php echo $_SESSION['user_name']; ?>",
                                        home_team:home_team,
                                        away_team:away_team,
                                        date:date,
                                        time:time,
                                        referee:referee,
                                        venue:venue
                                    },
                                    function(data,status){
                                        
                                        if(status=="success"){
                                           if(data=="success"){
                                              alert("Successfully added event: "+data);
                                              }else{
                                                  alert("Failed operation: "+data);
                                              }
                                           }
                                        else{
                                            alert("Fatal Error: "+data);
                                            location.reload();    
                                          }
                                    }
                                );
                                
                            })
                                
                                
                            }else{
                                response = false;
                            }
                            
                            return response;
                            
                        }   
                        
                    </script>
                    
                </form>
                
            </div>
        
            <script>
                
            </script>
            
        </div>
        
    </main>
        
    <!--code below alters edit and add buttons when clicked-->
    <script>        
        function show_add_event(x){
            $("#selectors h3").removeClass().addClass("btn btn-default");
            $(x).removeClass().addClass("btn btn-primary");
            $("#edit_event").hide(200);
            $("#add_event").show(200);
        }
        
        function show_edit_event(x){
            $("#selectors h3").removeClass().addClass("btn btn-default");
            $(x).removeClass().addClass("btn btn-primary");
            $("#add_event").hide(200);
            $("#edit_event").show(200)            
        }
        
    </script>
        
   <?php include_once("include/footer.php"); ?>
    
</body>    
</html>