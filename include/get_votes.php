<?php 
//this script will also update user vote history if conditions are met
//this script is only posed to run if user hasn't voted before
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
                    
                    //code below gets around any null value error by assigning a blank array
                    $decoded_data_v = isset($decoded_data_v)?$decoded_data_v:[];
                    
                    // convert match_ID and vote variables to int for database
                    $match_ID = (int)$match_ID;
                    $home_add = (int)$home_add;
                    $draw_add = (int)$draw_add;
                    $away_add = (int)$away_add;
                    
                    //code below will add match_id to user vote history
                    if(array_push($decoded_data_v,$match_ID) ){
                        
                        //code below will add vote to fixtures table
                        if($conn->query("UPDATE fixtures SET home_votes=home_votes+$home_add, draw_votes=draw_votes+$draw_add, away_votes=away_votes+$away_add WHERE match_ID = $match_ID ") ){
                        
                        //encode data before sending to database
                        $encoded_data_v = json_encode($decoded_data_v);
                        
                        if($conn->query("UPDATE users SET user_votes = '$encoded_data_v' WHERE user_id=$user_id ") ){
                            
                        }else{
                            echo " <div class='jumbotron'> Failed to Complete operation </div>";
                            $conn->close();
                            exit();     
                        }
                            
                        }else{                            
                            echo " <div class='jumbotron'> Failed to add vote </div>";
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
                            
        //if no votes are cast i.e 0 votes display alt block
        //this will get around division by zero error
        if( empty($home_votes) && empty($away_votes) && empty($draw_votes) ){
            echo "      
                <div id='vote-markers'>
                    <h3> Who will win </h3>

                    <p>
                        <span class='btn btn-success'></span> &bull;
                        Home win($home_votes votes)                                      
                    </p>

                    <p>
                        <span class='btn' style='background-color:#9d9494c4'></span> &bull; 
                        Draw($draw_votes votes)                                    
                    </p>

                    <p>
                        <span class='btn btn-primary'></span> &bull; 
                        Away win($away_votes votes)                                      
                    </p>

                </div>

                 <h4 style='text-align:center'>We ran into a problem </h4>
                 <div id='vote-block-2'>  

                    <div id='home-vote' style='width:100%'>No votes yet </div>
                 </div>       
            ";

        }else{

        $home_perc = floor( ($home_votes/$total_votes) * 100 );
        $draw_perc = ceil( ($draw_votes/$total_votes) * 100 );
        $away_perc = floor( ($away_votes/$total_votes) * 100 );        

        echo("        
        <div id='vote-markers'>
            <h3> Who will win </h3>

            <p>
                <span class='btn btn-success'></span> &bull;
                Home win($home_votes votes)                                      
            </p>

            <p>
                <span class='btn' style='background-color:#9d9494c4'></span> &bull; 
                Draw($draw_votes votes)                                    
            </p>

            <p>
                <span class='btn btn-primary'></span> &bull; 
                Away win($away_votes votes)                                      
            </p>

        </div>

        <div id='vote-block-2'>         
            <div id='home-vote' style='width:$home_perc%'> $home_perc% </div>
            <div id='draw-vote' style='width:$draw_perc%'> $draw_perc% </div>
            <div id='away-vote' style='width:$away_perc%'> $away_perc% </div>
        </div>        
        ");

        }

                            
                        
        
        
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
