<?php 
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
    require_once("coreDB.php");
    $data = $_POST['data'];
    
    if($result = $conn->query("SELECT * FROM players where fname LIKE'%$data%' OR lname LIKE'%$data%' ORDER BY lname ASC, fname DESC LIMIT 7")){
        if($result->num_rows>0){            
            while($row = $result->fetch_assoc()){
                extract($row);
                echo("       
                <script> 
                    $('document').ready(function(){
                    $('#player_id_$player_ID').click(function(){
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
                
                <li style='padding:10px' onmouseover=\"this.style.background='lightgrey'\" onmouseout=\"this.style.background='white'\" title=\"See $lname's Bio\">
                
                <a href='../playerview.php' id='player_id_$player_ID'>
                
                <img src='../$player_pic' width='50' onerror='player_imgerror(this)'>
                $fname $lname
                <span style='font-size:14px;display:block;font-weight:bold;'>$club</span>
                </a>".(
                        isset($_SESSION['user_id']) && $_SESSION['user_type'] === 'admin' && isset($_SESSION['user_name']) ?"<a href='../editplayer_view.php?playerid=$player_ID&club=$club&nationality=$nationality' title='Edit $fname $lname'><b>Edit?</b></a>":""                    
                      )."
                </li>
                ");
            }
            
        }else{
            echo "<li style='padding:10px'>No Matches Found</li>";
        }
    }else{
        echo "<li style='padding:10px'>Fatal Error 1</li>";
    }	
		
}else{
    echo "<li style='padding:10px'>Fatal Error 2</li>";	
}



?>