<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
    require_once("coreDB.php");
    
    function verify_info($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
        
    return $data;
    }
    
    //'u' signifying user side as there might be conflicts with db column names
    $u_user_name = verify_info($_POST['user_name']);
    $u_password = verify_info($_POST['password']);
    
    //check if username is already in the DB
    if($result = $conn->query("SELECT * FROM `users` WHERE user_name='$u_user_name' ")){
        if($result->num_rows < 1){
                
                //count number of users in db and assign user_id to $_SESSION[]
                if($result2 = $conn->query(" SELECT COUNT(`user_id`)  AS `user_count` FROM `users` ")){
                    if($result2->num_rows >= 0){
                        while($get_user_count = $result2->fetch_assoc()){
                            $user_count = $get_user_count['user_count'];
                        }
                    }
                }        
            
                //if username is not in db account is created                
                if($conn->query(" INSERT INTO `users`(`user_name`,`password`,`user_type`,`user_pic`) VALUES('$u_user_name','$u_password','user',null) ")){                    
                    session_start();
                    $_SESSION['user_id'] = $conn->insert_id;
                    $_SESSION['user_name'] = $u_user_name;
                    $_SESSION['user_type'] = "user";
                    $conn->close();
                    header("location: ../league_selected.php?league_id=1&code=mw-tsl&league_name=TNM Super League");
                    exit();
                    
                }else{
                    $conn->close();
                    header("location: ../create_account.php?failed_to_create_account");
                    exit();
                }
                
        }else{
            $conn->close();
            header("location: ../create_account.php?user_name_already_taken");
            exit();
        }
                
    }else{
        $conn->close();
        header("location: ../create_account.php?query_failed");
        exit();
    }
    
    
    
}else{
    $conn->close();
    header("Location: ../create_account.php?request_method_failed");
    exit();
}

?>