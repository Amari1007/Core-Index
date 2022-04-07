<?php
session_start();

if(isset($_SESSION['user_id']) && $_SESSION['user_type']==="admin" && isset($_SESSION['user_name']) ){
    
}else{
    header("location:sign_in.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once("include/headCode.php") ;?>    
    <head>
        <script>
            document.title = "Developers: Edit Event";
        </script>
    </head>

    <body>
    <?php require_once("include/header.php") ?>

    <main>
        <div class="container-fluid">
            
            <div class="jumbotron">
                <h3>Edit Existing Event</h3>
            </div>
        
        </div>        
    </main>
    
   <?php include_once("include/footer.php"); ?>
    
</body>    
</html>