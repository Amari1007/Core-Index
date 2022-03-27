<?php 
 @$conn = new mysqli("localhost","Admin","123abc","core");


if($_SERVER['REQUEST_METHOD']==='POST'){
    extract($_POST);    
}

else{
    echo "<div class='jumbotron'> <h2>Couldn't determine request method</h2> </div>";
}


if($result = $conn->query("SELECT * FROM `$fixtures` WHERE date like '$month' ")){
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            extract($row);
                
            $date = strtotime($date);
            $time = strtotime($time); 
                
            if($status=='played'){
                $match_link = " <a href='match_view.php?match_ID=$match_ID&code=$code&league_name=$league&fixtures=$code-fixtures'>$home_goals-$away_goals</a> ";
            }
            else if($status=='not-played'){
                 $match_link = date("H:i",$time);
            }
            else if($status=='live'){
                $match_link = " $home_goals-$away_goals ";
            }
            else if($status=='pending'){
                $match_link = " $home_goals-$away_goals ";
            }
            else if($status=='disable'){
                $match_link = " $home_goals-$away_goals ";
            }
            else{
                $match_link = date("H:i",$time);
            }
            
            //code below creates a new table every time
            echo " 
         <table class='table table-hover table-responsive' style='width:90%; margin:auto'>
           <tr>
            
           <td style='width:15%; text-align:left'> <span>".date('M D d',$date)."</span> </td>
           
           <td style='text-align:right; width:37%; font-weight:bold'> $home_team</td> 
            
            <td style='width:10%; font-size:15px; padding:5px; text-align:center; background-color:lightgrey; font-weight:bold;'> 
            $match_link
            </td> 
           
           <td style='text-align:left; width:38%; font-weight:bold'>$away_team</td>           
           
           </tr>      
           </table>    
                 ";              
        }   
    }else{
         echo "<div class='jumbotron'> <h2>No fixtures available</h2> </div>";
    }    
}

$conn->close();
exit();

?>