<?php 
session_start();
require("coreDB.php");
extract($_POST); 

     // VERIFY IF THE USER IS AN ADMIN
if($_SERVER['REQUEST_METHOD']==='POST' && isset($user_name) && isset($user_id) && $user_type =='admin' ){
    // UPDATE THE DATABASE WITH THE USERS INPUT
    if($conn->query(" UPDATE fixtures set venue ='$venue', referee='$referee', time='$time', date='$_date' where match_ID=$match_ID ")){            
        echo "$user_name, modified event: $match_ID";
        
        // IF AN ERROR OCCURS WHILE UPDATING EXIT LOOP AND DISPLAY ERROR
    }else{
        echo "failed OP 2";
    }    
    
}
else{
    echo "failed OP 1";
}


?>