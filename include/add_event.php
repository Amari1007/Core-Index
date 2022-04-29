<?php 
session_start();
require("coreDB.php");
extract($_POST); 

if($_SERVER['REQUEST_METHOD']==='POST' && isset($user_name) && isset($user_id) && $user_type =='admin' ){
       extract($_POST);
    
    if($conn->query(" INSERT INTO `fixtures`(`competition`,`competition_code`,`home_team`,`away_team`,`date`,`time`,`venue`,`referee`) VALUES('TNM Super League','mw-tsl','$home_team','$away_team','$date','$time','$venue','$referee') ")){            
        echo "success";
        
    }else{
        echo "Failed OP *";
    } 
    
}
else{
    echo "Failed OP **";
}


?>