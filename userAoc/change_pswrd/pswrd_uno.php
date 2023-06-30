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
            document.title = "Change Password";
        </script>
        <link type="text/css" rel="stylesheet" href="../style.css">
    </head>

    <body>

        <main class="container">
            <div class="a1">
                <div class="a1-h1">
                    <h2>User Account Settings <span class="glyphicon glyphicon-user"></span> <span class="a1-h1-back" onclick="location.assign('../../settings.php') " title="Go Back To Settings Page">Go Back <span class="glyphicon glyphicon-remove-sign"></span> </span></h2>
                    <h3>Change Password for current user (<?php echo $_SESSION['user_name'];?>)</h3>
                </div>
                
                <div class="a1-b1">
                    <form method="post" action="include/verify_current_psswrd.php" name="form1" onsubmit="return verify(this)" >                        
                        <div class="a1-c1" style="padding-left:25px">
                            <p style="color:red; font-weight:bold">Enter Current Password</p>
                            <input type="text" name="pswrd" placeholder="Enter your password...." maxlength="30" required>
                            <span class="glyphicon glyphicon-remove a1-tick-red" onclick="document.form1.pswrd.value='' " style="cursor:pointer" title="Clear"></span>
                        </div>
						<div class="a1-c1">We need to verify it's you</div>                        
                        <div class="a1-c1 custom-submit">
                            <button type="submit" class="btn" name="sub_btn" style="cursor:pointer" id="a1-ff">Next</button>
                        </div>
					</form>
					
                </div>
                
            </div>            
        </main>
		
		<?php include("include/footer.php") ?>
    
</body>   
    
    <script>
		const pswrd_input = document.forms.form1.pswrd;
		
		function verify(obj){
			if(pswrd_input.value.trim().length<3){
				alert("Password is too short");
				return false;				
			}
			
			//return true;
		}
    </script>
    
</html>