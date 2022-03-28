<?php
session_start();
require_once("include/coreDB.php");
?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once("include/headCode.php") ;?>    
    <head>
        <script>
            document.title = "Sign-in";
        </script>
    </head>

    <body>    
    <?php require_once("include/header.php") ?>
    
    <main class="container-fluid">
        
        <form class="" method="post" action="" style="width:60%;margin:auto">
            <div class="form-control">
                <input type="text" placeholder="User Name..." autocomplete="off">
            </div>
            <div class="form-control">
                <input type="password" placeholder="Password..." autocomplete="off">
            </div>
                
            <button type="submit" class="btn btn-success">Sign-in</button>
            <button type="reset" class="btn btn-main">Reset</button>
            
        </form>

    </main>
    
   <?php include_once("include/footer.php"); ?>    

    </body>
    
</html>