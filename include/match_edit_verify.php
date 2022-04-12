<?php 
session_start();
require("coreDB.php");

if($_SERVER['REQUEST_METHOD']==='POST'){
    extract($_POST);    
    
    if($conn->query("select * from fixtures where venue='$data' ")){
        echo "success";
    }else{
        echo "failed OP 2";
    }
    
}
else{
    echo "failed OP 1";
}


?>