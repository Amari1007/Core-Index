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
            document.title = "Core Index Developers";
        </script>
        <style>
            .jumbotron{
                padding: 20px 0px 30px 0px;
            }
            
            .jumbotron span{
                font-size: 30px;
            }
        
        </style>
    </head>

    <body>
    <?php require_once("include/header.php") ?>

    <main class="container">
        <div class="row">

            <div class="col-sm-4" title="Add or Edit Any Upcoming Match Event">
                <a href="edit_Event.php">
                    <div class="jumbotron">
                        <h2>Edit Event</h2>                        
                        <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                </a>
            </div>
            
            <div class="col-sm-4" title="Add a Player To The Database">
                <a href="addplayer.php">
                    <div class="jumbotron">
                        <h2>Add Player</h2>
                        <span class="glyphicon glyphicon-user"></span>
                        <span class="glyphicon glyphicon-plus"></span>
                    </div>
                </a>
            </div>

            <div class="col-sm-4" title="Edit a Player In The Database">
                <a href="editplayer.php">
                    <div class="jumbotron">
                        <h2>Edit Player</h2>
                        <span class="glyphicon glyphicon-user"></span>
                        <span class="glyphicon glyphicon-edit"></span>
                    </div>
                </a>
            </div>

            <!-- UNCOMMENT AFTER PRESENTATION
            <div class="col-sm-3" title="Choose Another Option">
                <a href="#">
                    <div class="jumbotron">
                        <h2>Other Options</h2>
                        <span class="glyphicon glyphicon-user"></span>
                        <span class="glyphicon glyphicon-cog"></span>
                    </div>
                </a>
            </div> -->
        
        </div>
    </main>
    
   <?php include_once("include/footer.php"); ?>
    
</body>    
</html>