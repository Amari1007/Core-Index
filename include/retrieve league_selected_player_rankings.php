<?php 
    require_once("coreDB.php");

    if(isset($_POST['x'])){
       extract($_POST); 
    }else{
        echo "<div class='jumbotron'><h3>Data currently unavailable: POST error</h3></div>";
    }

    if($result=$conn->query("SELECT player_ID,fname,lname,player_pic, club,nationality,$x as 'returns' FROM `players` WHERE $x>=1 and league_code='mw-tsl' order by $x desc")){
    if($result->num_rows > 0){
        //sets table structure
    echo "
    <table class='table table-hover' style='width:100%; margin:auto'>
    <thead>
    <tr>
    <th style='width:25%'>Name</th> 
    <th style='width:25%'></th>
    <th style='width:50%'>".strtoupper($x)."</th>
    </tr>  
    </thead>
    ";

    while($row = $result->fetch_assoc()){
    extract($row);  
//        $goals = (int)$goals;
//        $assists = (int)$assists;

    echo "
    <tr>
        <script>            
            $('document').ready(function(){
                $('.player_id_$player_ID').click(function(){
                    var player_id_$player_ID = {playerid:$player_ID, fname:'$fname', lname:'$lname', club_name:'$club', nationality:'$nationality'} 
                    var x = JSON.stringify(player_id_$player_ID);

                    $.post(
                        'include/player_data.php',
                        {
                            data:x
                        },
                        function(data,status){
                            if(status=='success'){
                                window.open(data, '_parent');
                            }else{
                                window.open(' ".( htmlspecialchars($_SERVER['PHP_SELF']) )." ', '_parent');
                            }                            
                        }
                    );

                });
            });
        </script>
        
    <td> <a class='player_id_$player_ID' style='cursor:pointer' title='Get to know $fname $lname'>$fname $lname</a> 
    <p>($club)</p>
    </td> 
    <td> <a href='playerview.php?playerid=$player_ID&club_name=$club&nationality=$nationality'> <img width='70' class='img-circle' src='$player_pic' onerror='player_imgerror(this)' alt='$fname $lname.png'> </a> 
    </td>
    
   <!--i gave the element below the .ST class to color it-->
    <td> <span class='ST'> $returns</span> </td>                 
    </tr>  
    ";
            }
        echo " </table>";
            
        }else{
        echo "<div class='jumbotron'><h3>Data currently unavailable</h3></div>";
    }
    }else{
        echo "<div class='jumbotron'><h3>Data currently unavailable</h3></div>";
    }

    $conn->close(); //closed connection to database here

    ?>
