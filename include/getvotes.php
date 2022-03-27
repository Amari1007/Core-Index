<?php 
require_once("coreDB.php");

if(isset($_POST['match_ID'])){
    extract($_POST);
}else{
    $conn->close();
    echo "Fatal error 1";
    exit();
    
}

if($result = $conn->query("SELECT * FROM `mw-tsl-fixtures` WHERE match_ID=$match_ID LIMIT 1")){
    if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        extract($row);
        echo 
            "
             <div class='votes_bar'>
             
             <div class='home_votes'>
             $home_votes%
             </div>
              
             <div class='away_votes'>
             $away_votes%
             </div>
             <span style='visibility:hidden'>x</span> 
             </div>
              ";
    }

    }else{
         $conn->close();
         echo "Fatal error 2";
         exit();
    }                

}else{
    $conn->close();
    echo "Fatal error 3";
    exit();
}

?>

<script>
    $(document).ready(function(){
      /** VOTES **/
        <?php 
        $home_votes = (int) $home_votes; 
        $away_votes = (int) $away_votes; 
        ?>
        var home = <?php echo $home_votes ?>;
        var away = <?php echo $away_votes ?>;
        var total = home+away;
        home_per = home/total*100;
        away_per = away/total*100; 
        
        home_per = Math.ceil(home_per);
        away_per = Math.floor(away_per);
        
        if(home==0){
            $('.votes_bar .home_votes').remove();
            $('.votes_bar .away_votes').css('width','100%').text(away+'%');            
        }
        else if(away==0){
            $('.votes_bar .away_votes').remove();
            $('.votes_bar .home_votes').css('width','100%').text(home+'%');     
        }      

        $('.votes_bar .home_votes').css('width',''+home_per+'%').text(home_per+'%').attr('title',home_per+'% of people think <?php echo $home_team ?> will win');
        $('.votes_bar .away_votes').css('width',''+away_per+'%').text(away_per+'%').attr('title',away_per+'% of people think <?php echo $away_team ?> will win');
        
    });

</script>

