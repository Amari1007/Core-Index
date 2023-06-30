<?php
session_start();

if( isset($_SESSION['user_id']) && isset($_SESSION['user_type']) && isset($_SESSION['user_name']) ){
    require_once("include/last_activity.php");
}else{
    header("location:../../sign_in.php?error=user_logged_out");
	session_unset();
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once("include/headCode.php") ;?> <!--GETS HEAD-CODE FROM FOLDER IN SAME DIRECTORY-->  
    <head>
        <script>
            document.title = "Change Profile Picture";
        </script>
        <link type="text/css" rel="stylesheet" href="style.css">
    </head>

    <body>

        <main class="container">
            <div class="a1">
                <div class="a1-h1">
                    <h2>Change Profile Picture <span class="glyphicon glyphicon-user"></span> 
					<span class="a1-h1-back" onclick="location.assign('../../settings.php') " title="Go Back To Settings Page">Go Back <span class="glyphicon glyphicon-remove-sign"></span> </span>
					</h2>
                </div>
                
                <div class="a1-b1">
					
					<form method="post" onsubmit="return true" action="include/upload_pfp.php" enctype="multipart/form-data" name="form1"> 
						
						<div class="a1-c1">
							<input type="file" name="user_pic" accept="image/*" id="user_pic" onchange="dothis(this)" required>
							
							<button type="reset">Cancel</button>
						</div>
						
						<div class="a1-c1">
							<button type="submit" name="submit" class="btn btn-success">Change</button>
						</div>
					</form>
				
				</div>
                
            </div>
			
        </main>
		
		<?php include("include/footer.php") ?>
    
	</body>
	
	<script> 
		
		function dothis(obj){
			//const user_pfp_box = document.forms.form1.getElementsByClassName('user_pfp');
			
		}
		
	</script>		
    
</html>