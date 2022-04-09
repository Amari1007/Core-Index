<?php 
session_start();
require("coreDB.php");

if($_SERVER['REQUEST_METHOD']==='POST'){
    extract($_POST);    
    
    if($conn->query(" UPDATE `fixtures` SET `referee` = '$data' WHERE match_ID = $match_ID; ") === true){
        echo "success"        ;
    }else{
        echo "failed OP 2";
    }
    
}
else{
    echo "failed OP 1";
}


?>