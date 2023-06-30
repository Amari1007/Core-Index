<?php         
extract($_SESSION);

//check if user is logged in
if( isset($user_id) && isset($user_name) ){
     if($vote_query = $conn->query(" SELECT * FROM users WHERE user_id = $user_id ") ){
        if($vote_query->num_rows > 0){
            while($vote_rows = $vote_query->fetch_assoc() ){
                
                //cast $match_ID to int to prevent comparison problems
                $match_ID = (int) $match_ID;
                
                //get previous vote data
                $decoded_data_v = json_decode($vote_rows['user_votes']);                
                
                //code below gets around null value error by assigning a blank array
                $decoded_data_v = !empty($decoded_data_v)?$decoded_data_v:array(0);
                
                //check if match_id is in previous vote data
                if(array_search($match_ID,$decoded_data_v)){

                    //display vote results bar if vote history is found                              
                    if($vote_result_query = $conn->query("SELECT status,home_votes,away_votes,draw_votes, concat(home_votes+away_votes+draw_votes) AS total_votes FROM `fixtures` WHERE match_ID=$match_ID LIMIT 1")){
                        if($vote_result_query->num_rows > 0){
                        while($vote_result_row = $vote_result_query->fetch_assoc()){
                            extract($vote_result_row);
                            
                            //if no votes are cast i.e 0 votes display att block
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
                                
                            $home_perc = ceil( ($home_votes/$total_votes) * 100 );
                            $draw_perc = ceil( ($draw_votes/$total_votes) * 100 );
                            $away_perc = floor( ($away_votes/$total_votes) * 100 );   
                                
                                
                            //below code helps solve total_votes over 100% problem
                            if( ($home_perc+$draw_perc+$away_perc)>100 ){
                                if(!empty($draw_perc)){
                                    $draw_perc = $draw_perc-1;
                                }
                                else if(!empty($away_perc)){
                                    $away_perc = $away_perc-1;
                                }
                                else if(!empty($home_perc)){
                                    $home_perc = $home_perc-1;
                                }
                                
                            }

                            echo("        
                            <div id='vote-markers'>
                                <h3> Who will win? (Voting Closed) </h3>
                                
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
                                <div id='home-vote' style='width:$home_perc%'>".(!empty($home_perc)?"$home_perc%":" ")."</div>
                                <div id='draw-vote' style='width:$draw_perc%'>".( (!empty($draw_perc)?"$draw_perc%":" ") )."</div>
                                <div id='away-vote' style='width:$away_perc%'>".( (!empty($away_perc)?"$away_perc%":" ") )."</div>
                            </div>        
                            ");
                                
                            }
                            
                            
                        }

                        }else{
                             $conn->close();
                             echo "Fatal error 2";
                             exit();
                        }                

                    }
                    else{
                        $conn->close();
                        echo "query failed 2";
                        exit();
                    }

                }else{
                    
                    //if no vote history is found display vote block
                    echo("                            
                     <div id='vote-block-1'>
                        <h3> Who will win? </h3>

                       <div style='max-width:100%;margin:0px auto;min-height:50px;padding:5px;border:0px solid black'>

                        <button class='btn' id='home-vote' value='home'> Home </button>
                        <button class='btn' id='draw-vote' value='draw'> Draw </button>
                        <button class='btn' id='away-vote' value='away'> Away </button>

                       </div>

                    </div>
                    ");

                }

            }

        }else{
            $conn->close();
            echo "no results found for user_id";            
            exit();
        }        

    }else{
        $conn->close();
        echo "query failed";        
        exit();
    }

}
?>