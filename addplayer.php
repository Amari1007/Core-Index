<?php
session_start();
require_once("include/coreDB.php");

$message = ' ';
if(isset($_GET['message'])){
    $message = "</br>".$_GET['message'];
}
?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once("include/headCode.php") ;?>    
    <head>
        <link rel="stylesheet" type="text/css" href="css/communityaddplayer/style.css"/>
    </head>

    <body>
    <?php require_once("include/header.php") ?>

    <main class="container">
        <div>  
            <h3>Add Player to Database  <span class="text-danger"><?php echo $message ?></span> </h3>
        
            <form action="include/communityaddplayer.php" method="post" enctype="multipart/form-data">
                <table class="table-hover">
                    <tr><td>Picture</td> 
                        <td>
                        <input type="file" name="pic">
                        </td>                    
                    </tr>
                    
                    <tr><td>First Name</td> <td><input type="text" name="fname" required></td></tr>
                    <tr><td>Last Name</td> <td><input type="text" name="lname" required></td></tr>
                    <tr><td>Position</td> 
                        <td>  
                            <select name="position" required>
                             <option value="GK">GK</option>
                             <option value="CB">CB</option>
                             <option value="RB">RB</option>
                             <option value="LB">LB</option>
                             <option value="LWB">LWB</option>
                             <option value="RWB">RWB</option>
                             <option value="CDM">CDM</option>
                             <option value="CM">CM</option>
                             <option value="CAM">CAM</option>
                             <option value="LM">LM</option>
                             <option value="RM">RM</option>
                             <option value="LW">LW</option>
                             <option value="RW">RW</option>
                             <option value="CF">CF</option>
                             <option value="ST">ST</option>
                         </select>
                        
                        </td></tr>
                    
                    <tr><td>Age</td> <td><input type="number" max="99" min="15" name="age" title="No Players Under 15 Allowed" required></td></tr>
                    <tr><td>Nationality</td> <td><input type="text" name="nationality" required></td></tr>
                    <tr><td>Club</td> <td><input type="text" name="club" required></td></tr>                    
                    
                    <tr><td><input type="submit" value="ADD" name="add_button"></td></tr>
                </table>            
            </form>
        </div>
    </main>
    
   <?php include_once("include/footer.php"); ?>
    
</body>    
</html>