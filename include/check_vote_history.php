<?php         
extract($_SESSION);

//check if user is logged in
if( isset($user_id) && isset($user_name) ){
     if($vote_query = $conn->query(" SELECT * FROM users WHERE user_id = $user_id ") ){
        if($vote_query->num_rows > 0){
            while($vote_rows = $vote_query->fetch_assoc() ){

                //get previous vote data
                $decoded_data_v = json_decode($vote_rows['user_votes']);

                //check if match_id is in previous vote data
                if(array_search($match_ID,$decoded_data_v)){

                    //display vote results bar if vote history is found                                
                    if($vote_result_query = $conn->query("SELECT home_votes,away_votes,draw_votes, concat(home_votes+away_votes+draw_votes) AS total_votes FROM `fixtures` WHERE match_ID=$match_ID LIMIT 1")){
                        if($vote_result_query->num_rows > 0){
                        while($vote_result_row = $vote_result_query->fetch_assoc()){
                            extract($vote_result_row);

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
                             //$conn->close();
                             echo "Fatal error 2";
                        }                

                    }
                    else{
                        //$conn->close();
                        echo "query failed 2";
                    }

                }else{
                    //if no vote history is found display vote block
                    echo("                            
                     <div id='vote-block-1'>
                        <h3> Who will win?</h3>

                       <div style='max-width:100%;margin:0px auto;min-height:50px;padding:5px;border:0px solid black'>

                        <div class='btn' id='home-vote'>Home</div>
                        <div class='btn' id='draw-vote'>Draw</div>
                        <div class='btn' id='away-vote'>Away</div>

                       </div>

                    </div>
        ");

                }

            }

        }else{
            //$conn->close();
            echo "no results found for user_id";            
        }        

    }else{
        //$conn->close();
        echo "query failed";        
    }

}
?>