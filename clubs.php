<?php 
session_start();
?>

<!DOCTYPE html>
<html>
    <?php require_once("include/headCode.php") ;?>  
    <link rel="stylesheet" type="text/css" href="css/clubsphp/style.css">
    <body>
       <?php require_once("include/header.php") ?>
        
        <main class="container">
                
            <?php 
    
               require_once("include/coreDB.php");
    
                    if($result = $conn->query("SELECT * FROM clubs order by club_ID desc")){
                        if($result->num_rows>0){
                            while($row = $result->fetch_assoc()){
                                extract($row);
                                
                                 echo("
                                 
                <table class='table-hover'>
                
                 <tr>
                    <td colspan='2' style='text-align:center'><img class='img-circle' width='100' src='$club_pic'  onerror='team_imgerror(this)' alt='$club_name.jpg'></td>		
                </tr>
                <tr>
                    <td>Club Name</td>
                    <td> <a href='clubview.php?clubid=$club_ID&club_name=$club_name'>$club_name</a></td>		
                </tr>
                <tr>
                    <td>League</td>   
                    <td>$league</td>		
                </tr> 
                <tr>
                    <td>Manager</td>
                    <td>$manager</td>		
                </tr>
                <tr>
                    <td>Overall Rank</td>
                    <td> </td>		
                </tr>
                
                 </table>"); 
                            }
                        }else{
                            echo "no clubs in database";
                        }
                    }
            ?>
        
        </main>

    
       <?php include_once("include/footer.php"); ?>  
    </body>

</html>
