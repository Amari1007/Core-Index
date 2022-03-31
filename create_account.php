<?php
session_start();

if( isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ){
    header("location: index.php?already_logged_in");
}

require_once("include/coreDB.php");
?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once("include/headCode.php") ;?>    
    <head>
        <script>
            document.title = "Create User Account";
        </script>
        
        <!-- CHANGE SCRIPT SOURCE LATER -->
         <link rel="stylesheet" href='css/create_accountphp/style.css'> 
    </head>

    <body onload="alert('Logged in as <?php echo $_SESSION['user_name'] ?>')">    
    <?php require_once("include/header.php") ?>
    
    <main class="container-fluid">
        
        <h1 style="text-align:center;margin-bottom:30px">Create Account</h1>
        
        <form method="post" action="<?php echo htmlspecialchars("include/create_account_verify.php") ?>" autocomplete="off">
            <div class="form_field">
                <div class="form-group">
                    <label for="user_name"><h4>User Name</h4></label> <br/>
                    <input type="text" name="user_name" id="user_name" placeholder="User Name..." required>
                </div>

                <div class="form-group">
                    <label for="password"><h4>Password</h4></label>
                    <br/>
                    <input type="password" name="password" id="password" required>
                </div>
                
                <p><a href="sign_in.php" title="Click To Sign In">Already Have An Account?</a></p>
                <button type="submit" class="btn btn-success">Create</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </form>

    </main>
    
   <?php include_once("include/footer.php"); ?>    

    </body>
    
</html>