<?php
session_start();
require_once("../include/coreDB.php");

if(!isset($_GET['code'])){
    header('../Location:leagues.php');
}
else{
    extract($_GET);
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <?php require_once("include/headCode.php") ;?>    
    
    <head>
        <script>
            document.title = "Ntopwa Fc Appoint First Female Coach";
        </script>
    </head>
    
    <body>    
        <?php require_once("include/header.php") ?>        

        <!--LEAGUE NAVIGATION BAR -->
        <?php require_once("include/league_navtab.php") ?>
        
        <!--CONTENT-->
        <main class="container-fluid">
            <h1>Header 1</h1>
            <p>Paragraph Paragraph Paragraph Paragraph Paragraph Paragraph </p>
        </main>
        
        <aside class="container-fluid">
            Aside
        </aside>
            
   <?php include_once("include/footer.php"); ?>
    
</body>    
</html>