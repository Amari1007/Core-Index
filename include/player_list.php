<?php 
if($result = $conn->query("SELECT * FROM players ORDER BY player_ID ASC LIMIT 20 ")){
    
    //execute query in database and store results in $result var
    if($result->num_rows > 0 ){
        
        echo "<table class='table table-hover'>
              <thead>
              <tr>
              <th class='player_photo' style='width:15%'>Photo</th>
              <th class='player_nationality' style='width:5%'></th>
              <th class='player_name' style='width:25%'>Name</th>
              <th class='player_position' style='width:5%'>Position(s)</th>
              <th class='player_age' style='width:5%'>Age</th>
              <th class='player_club' style='width:45%'>Club</th>              
              </tr>   
              </thead>
        ";//establishes table structure
        
        while($row = $result->fetch_assoc()){
            
            extract($row); //extract all column names
            
            //$club_pic='N/a';
            if($result2=$conn->query("SELECT club_ID, club_pic FROM `clubs` WHERE club_name like '%$club%'")){
                if($result2->num_rows>0){
                    while($get_info=$result2->fetch_assoc()){
                        $club_pic = $get_info['club_pic'];
                        $club_ID = $get_info['club_ID'];
                    }
                    
                }else{
                    $club_pic='';
                    $club_ID=null;
                }
            }else{
                    $club_pic='';
                    $club_ID='';
                }

            
            if($result3=$conn->query("SELECT nation_pic FROM `national_team` WHERE nation_name like '%$nationality%' ")){
                if($result3->num_rows>0){
                    while($get_pic=$result3->fetch_assoc()){
                        extract($get_pic);
                    }                    
                }else{
                    $nation_pic='';
                }
            }else{
                $nation_pic='';
            }
            
            //NOTE: 2 ELEMENTS CANT HAVE THE SAME ID(#)!!!!!1
            
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
            
                <td style='text-align:right'> 
                <figure> 
                <a class='player_id_$player_ID' style='cursor:pointer' title='Get to know $fname $lname'> 
                <img width='70' class='img-circle' src='$player_pic' onerror='player_imgerror(this)' alt='$fname $lname.png'>
                </a>                
                </figure> 
                </td>
                
                <td style='padding-top:25px'> 
                <figure> 
                <img width='25' src='$nation_pic' onerror='team_imgerror(this)' alt='$nationality.png'>
                </figure> 
                </td>
                
                <td style='padding-top:25px'> 
                <a class='player_id_$player_ID' style='cursor:pointer' title='Get to know $fname $lname'>$fname $lname
                </a>
                </td>
                
                <td style='padding-top:25px'> <span class='$position'>$position</span> </td>
                
                <td style='padding-top:25px'>$age</td> 
                
                <td data-title='club'> 
                <figure> <a title='Get to know $club' href='clubview.php?clubid=$club_ID&club_name=$club'> <img width='60' src='$club_pic' onerror='team_imgerror(this)' alt='$club.png'></a> 
                </figure> 
                </td>     
                
            </tr>
          ";

    }
        echo "</table>"; //completes table structure
} 
    else{
     echo "<div class='jumbotron'> <h3> An error occured while getting players from Core db 1</h3> </div>";
    }
}else{
     echo "<div class='jumbotron'> <h3> An error occured while getting players from Core db 2</h3> </div>";    
}

?>
