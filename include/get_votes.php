<?php 
//this script will also update user vote history if conditions are met
session_start();
require_once("coreDB.php");

if(isset($_POST['match_ID']) && isset($_POST['user_id']) && isset($_POST['user_name']) ){
    extract($_POST);
   
    if($result = $conn->query("SELECT home_votes,away_votes,draw_votes, concat(home_votes+away_votes+draw_votes) AS total_votes FROM `fixtures` WHERE match_ID=$match_ID LIMIT 1")){
    if($result->num_rows > 0){
        
    while($row = $result->fetch_assoc()){
        
        // insert match_id vote in user table
        if($vote_query = $conn->query(" SELECT * FROM users WHERE user_id = $user_id ") ){
            if($vote_query->num_rows > 0){
                while($vote_rows = $vote_query->fetch_assoc() ){
                    //get previous vote data
                    $decoded_data_v = json_decode($vote_rows['user_votes']);
                    
                    // convert match_ID to int for database
                    $match_ID = (int)$match_ID;
                    
                    //code below will add match_id to user vote history
                    if(array_push($decoded_data_v,$match_ID) ){
                        
                        //encode data before sending to database
                        $encoded_data_v = json_encode($decoded_data_v);
                        
                        if($conn->query("UPDATE users SET user_votes = '$encoded_data_v' WHERE user_id=$user_id ") ){
                            echo "successfully added";
                            $conn->close();
                            exit();
                            
                        }else{
                            echo "couldnt add to adatabase";
                            $conn->close();
                            exit();     
                        }
                        
                        
                        
                    }else{
                        echo "fatal array push error";
                        $conn->close();
                        exit();                         
                    }
                    
                                       
                }
            }

        }else{
            echo "couldnt retrieve user vote history";
            $conn->close();
            exit();
        }           
           
        extract($row);        
           
        $home_perc = floor( ($home_votes/$total_votes) * 100 );
        $draw_perc = ceil( ($draw_votes/$total_votes) * 100 );
        $away_perc = floor( ($away_votes/$total_votes) * 100 );        
        
        echo("        
        <div id='vote-markers'>
            <h3> Who will win </h3>
            <p>Home win($home_votes votes) <span class='btn btn-success'><span> </p>
            <p>Draw($draw_votes votes) <span class='btn' style='background-color:#9d9494c4'><span> </p>
            <p>Away win($away_votes votes) <span class='btn btn-primary'><span> </p>
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
