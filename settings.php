<?php
session_start();

if( isset($_SESSION['user_id']) && isset($_SESSION['user_type']) && isset($_SESSION['user_name']) ){
    require_once("include\last_activity.php");
}else{
    header("location:sign_in.php?error=user_logged_out");
	session_unset();
    exit();
}

require("include/coreDB.php");
$query_response = $user_db_data = Null;
if($query_response = $conn->query("SELECT * FROM `users` WHERE `user_id`= {$_SESSION['user_id']} ") ){
	if($query_response->num_rows > 0){
		$user_db_data = $query_response->fetch_assoc();
	}
}

?>

<!DOCTYPE html>
<html lang="en">
    <?php require("include/headCode.php") ;?>    
    <head>
        <script>
            document.title = "User Account ";
        </script>
        <link type="text/css" rel="stylesheet" href="css/settings.css">
    </head>

    <body>
    <?php require("include/header.php") ?>

    <main class="container">
	
        <div class="a1">
            <h1>User Account Settings</h1>
			
			<div class="image_box">
				<img src="<?php echo "userAoc/change_pfp/include/".$user_db_data['user_pic'] ?>" width="130px" class="img-rounded"alt="image comes here" onerror="">
				<h2 style="display:inline-block"> <?php echo $_SESSION['user_name'] ?> </h2>
            </div>
			
            <div class="a2">
                <h2>Personal Details</h2>
                
                <div class="a3">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                                <tr class="a3-a1"> 
                                    <td style="width:100px;">Email</td> 
                                    <td> <input type="text" disabled="true" value="*******"></td> 
                                </tr>
                                <tr class="a3-a1"> 
                                    <td style="width:100px;">Date Joined</td> 
                                    <td><input type="text" disabled="true" value="<?php echo date('d-F-Y',strtotime($user_db_data['date_joined']) ); ?>"></td> 
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                
            </div>
        
        </div>
        
        <div class="b1">
            <h1 class="text-danger">Change Account Details <span class="glyphicon glyphicon-cog small"></span> </h1>
            
            <div class="table-responsive">
                <table class="table table-hover">
                    <tbody>
                        <tr class="a3-a1">
                            <td style="width:100px;"> <button class="btn btn-primary" style="width:140px" onclick="location.assign('userAoc/change_name.php')" title="Change Your Username">Change Username</button> </td> 
                        </tr>
                        <tr class="a3-a1">
                            <td style="width:100px;"> <button class="btn btn-primary" style="width:140px" onclick="location.assign('userAoc/change_pfp/index.php') " title="Change Your Profile Picture">New Profile Picture</button> </td> 
                        </tr>
                        <tr class="a3-a1">
                            <td style="width:100px;"> <button class="btn btn-primary" style="width:140px" disabled="true">Change Email</button <span> Currently Unavailable</span> </td> 
                        </tr>
                        <tr class="a3-a1">
                            <td style="width:100px;"> <button class="btn btn-danger" style="width:140px" onclick="location.assign('userAoc/change_pswrd/pswrd_uno.php')">Change Password</button> </td> 
                        </tr>
                        <tr class="a3-a1">
                            <td style="width:100px;"> <button class="btn btn-danger" style="width:140px" disabled="true">Delete Account</button> <span class="glyphicon glyphicon-trash" style="font-size:20px"></span> <span> Currently Unavailable</span></td> 
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </main>
    
   <?php require("include/footer.php"); ?>
    
</body>    
</html>