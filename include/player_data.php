<?php 
    if($_SERVER['REQUEST_METHOD']=='POST'){
        echo "playerview.php";			
        session_start();
        $_SESSION['data'] = $_POST['data'];			
            }else{
                session_start();
                if( !empty($_SESSION['data']) ){
                    $_SESSION['data'] = null;
                }else{
                    $_SESSION['data'] = $_SESSION['data'];
                }
                echo "index.php";
                }
?>
