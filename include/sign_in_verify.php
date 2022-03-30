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
    
    //check if user is in the DB
    if($result = $conn->query("SELECT * FROM `users` WHERE user_name='$u_user_name' ")){
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                
                //verify if characters exactly match each other and start session if true
                if($row['user_name'] === $u_user_name){
                    
                    //verify if user password matches
                    if($row['password'] === $u_password){
                        session_start();
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['user_type'] = $row['user_type'];
                        $_SESSION['user_name'] = $row['user_name'];
                    
                        //session_unset(); //comment this later
                        $conn->close();
                        header("location: ../leagues.php");
                        exit();
                    }else{ 
                        //if password is wrong
                        $conn->close();
                        header("location: ../sign_in.php?password_incorrect");
                        exit();
                    }
                    
                    
                }else{
                    $conn->close();
                    header("location: ../sign_in.php?user_doesnt_exist_2");
                    exit();
                }
            }
            
        }else{
            $conn->close();
            header("location: ../sign_in.php?user_doesnt_exist_1");
            exit();
        }
        
    }else{
        $conn->close();
        header("location: ../sign_in.php?query_failed");
        exit();
    }
    
    
    
}else{
    $conn->close();
    header("Location: ../sign_in.php?request_method_failed");
    exit();
}

?>