<?php 
session_start();
require("coreDB.php");
extract($_POST); 

if($_SERVER['REQUEST_METHOD']==='POST' && isset($user_name) && isset($user_id) && $user_type =='admin' ){
       
    
    if($conn->query(" UPDATE fixtures set venue = '$venue', referee='$referee' where match_ID=$match_ID ")){            
        echo "$user_name, modified event: $match_ID";
        
    }else{
        echo "failed OP 2";
    }    
    
}
else{
    echo "failed OP 1";
}


?>