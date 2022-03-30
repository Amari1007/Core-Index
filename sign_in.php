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
        <link rel="stylesheet" href='css/sign_inphp/style.css'>
    </head>

    <body>    
    <?php require_once("include/header.php") ?>
    
    <main class="container-fluid">
        
        <form method="post" action="<?php echo htmlspecialchars("include/sign_in_verify.php") ?>" autocomplete="off">
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
                
                <p><a href="#">Create Account Instead?</a></p>
                <button type="submit" class="btn btn-success">Sign-in</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </form>

    </main>
    
   <?php include_once("include/footer.php"); ?>    

    </body>
    
</html>