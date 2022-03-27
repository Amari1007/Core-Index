<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once("include/headCode.php") ;?>    
    <head>
        <link rel="stylesheet" type="text/css" href="css/communityphp/style.css"/>
    </head>

    <body>
    <?php require_once("include/header.php") ?>

    <main class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <a href="addplayer.php">
                    <div class="addplayer">
                        <h2>Add Player</h2>
                    </div>
                </a>
            </div>

            <div class="col-sm-6">
                <a href="editplayer.php">
                    <div class="editplayer">
                        <h2>Edit Player</h2>
                    </div>
                </a>
            </div>
        
        </div>
    </main>
    
   <?php include_once("include/footer.php"); ?>
    
</body>    
</html>