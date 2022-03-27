<?php 
require_once("coreDB.php");

if(!isset($_GET['match_ID'])){ header("Location:../leagues.php");
exit();
}
else{
extract($_GET);  
}


if($result = $conn->query("SELECT * FROM `mw-tsl-fixtures` WHERE match_ID=$match_ID LIMIT 1")){
    if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        extract($row);
        if(empty($home_possession) && empty($home_shots) && empty($home_corners) && empty($home_fouls) ){
            echo "<div class='jumbotron'> <h3>No Match Stats Available</h3> </div>";
            $conn->close();
            exit();
        }
        
        $date = strtotime($date);
    }

    }                
}

?>

<script>       
    $(document).ready(function(){
        { /** POSSESSION **/
        var home = <?php echo $home_possession ?>;
        var away = <?php echo $away_possession ?>;

        if(home==0){
            away = 100;
            $('#possession_bar #home').remove();
            $('#possession_bar #away').css('width',''+away+'%').text(away+'%');            
        }
        else if(away==0){
            home = 100;
            $('#possession_bar #away').remove();
            $('#possession_bar #home').css('width',''+home+'%').text(home+'%');     
        }
        
        $('#possession_bar #home').css('width',''+home+'%').text(home+'%');
        $('#possession_bar #away').css('width',''+away+'%').text(away+'%');
        }

        { /** SHOTS **/
        var home = <?php echo $home_shots ?>;
        var away = <?php echo $away_shots ?>;
        var total = home+away;
        home_per = home/total*100;
        away_per = away/total*100;            
        
        if(home==0){
            $('#shots_bar #home').remove();
            $('#shots_bar #away').css('width','100%').text(away+'%');            
        }
        else if(away==0){
            $('#shots_bar #away').remove();
            $('#shots_bar #home').css('width','100%').text(home+'%');     
        }    
            

        $('#shots_bar #home').css('width',''+home_per+'%').text(home+' Shots');
        $('#shots_bar #away').css('width',''+away_per+'%').text(away+' Shots');
        }

        { /** CORNERS **/
        var home = <?php echo $home_corners ?>;
        var away = <?php echo $away_corners ?>;
        var total = home+away;
        home_per = home/total*100;
        away_per = away/total*100;           
        
        if(home==0){
            $('#corners_bar #home').remove();
            $('#corners_bar #away').css('width','100%').text(away+'%');            
        }
        else if(away==0){
            $('#corners_bar #away').remove();
            $('#corners_bar #home').css('width','100%').text(home+'%');     
        }      

        $('#corners_bar #home').css('width',''+home_per+'%').text(home+' Corners');
        $('#corners_bar #away').css('width',''+away_per+'%').text(away+' Corners');
        }

        { /** FOULS **/
        var home = <?php echo $home_fouls ?>;
        var away = <?php echo $away_fouls ?>;
        var total = home+away;
        home_per = home/total*100;
        away_per = away/total*100;           
        
        if(home==0){
            $('#fouls_bar #home').remove();
            $('#fouls_bar #away').css('width','100%').text(away+'%');            
        }
        else if(away==0){
            $('#fouls_bar #away').remove();
            $('#fouls_bar #home').css('width','100%').text(home+'%');     
        }    

        $('#fouls_bar #home').css('width',''+home_per+'%').text(home+' Fouls');
        $('#fouls_bar #away').css('width',''+away_per+'%').text(away+' Fouls');
        }


    });


</script>

<div id="possession_box" style="text-align:center">    
    <h4>Possession</h4>
    <div id="possession_bar">            
        <div id="home">
            Home
        </div>

        <div id="away">
            Away
        </div>                
        <span style="visibility:hidden">x</span>            
    </div>            
</div>

<div id="shots_box" style="text-align:center">    
    <h4>Shots</h4>
    <div id="shots_bar">            
        <div id="home">
            Home
        </div>

        <div id="away">
            Away
        </div>                
        <span style="visibility:hidden">x</span>            
    </div>            
</div>

<div id="corners_box" style="text-align:center">    
    <h4>Corners</h4>
    <div id="corners_bar">            
        <div id="home">
            Home
        </div>

        <div id="away">
            Away
        </div>                
        <span style="visibility:hidden">x</span>            
    </div>            
</div>

<div id="fouls_box" style="text-align:center">    
    <h4>Fouls</h4>
    <div id="fouls_bar">            
        <div id="home">
            Home
        </div>

        <div id="away">
            Away
        </div>                
        <span style="visibility:hidden">x</span>            
    </div>            
</div>