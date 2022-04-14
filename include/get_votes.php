<?php 
session_start();
require_once("coreDB.php");

if(isset($_POST['match_ID']) && isset($_POST['user_name']) && isset($_POST['selected']) ){
    extract($_POST);
   
    if($result = $conn->query("SELECT home_votes,away_votes,draw_votes, concat(home_votes+away_votes+draw_votes) AS total_votes FROM `fixtures` WHERE match_ID=$match_ID LIMIT 1")){
    if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        extract($row);
        
        $home_perc = floor( ($home_votes/$total_votes) * 100 );
        $draw_perc = ceil( ($draw_votes/$total_votes) * 100 );
        $away_perc = floor( ($away_votes/$total_votes) * 100 );        
        
        echo("        
        <div id='vote-markers'>
            <p>Home win <span class='btn btn-success'><span> </p>
            <p>Draw <span class='btn' style='background-color:#9d9494c4'><span> </p>
            <p>Away win <span class='btn btn-primary'><span> </p>
        </div>
        
        <div id='vote-block-2'>         
            <div id='home-vote' style='width:$home_perc%'> $home_perc% </div>
            <div id='draw-vote' style='width:$draw_perc%'> $draw_perc% </div>
            <div id='away-vote' style='width:$away_perc%'> $away_perc% </div>
        </div>        
        ");
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

    
}else{
    $conn->close();
    echo "Fatal error 1";
    exit();    
}

?>
