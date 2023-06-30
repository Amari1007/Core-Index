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
            document.title = "Change User Password";
        </script>
        <link type="text/css" rel="stylesheet" href="../style.css">
    </head>

    <body>

        <main class="container">
            <div class="a1">
                <div class="a1-h1">
                    <h2>User Account Settings <span class="glyphicon glyphicon-user"></span> <span class="a1-h1-back" onclick="location.assign('../../settings.php') " title="Go Back To Settings Page">Go Back <span class="glyphicon glyphicon-remove-sign"></span> </span></h2>
                    
                </div>
                
                <div class="a1-b1">
                    <form method="post" name="form1" onkeyup="check(this)" onsubmit="return verify(this)" action="include/change_db_pswrd.php">
					
                        <div class="a1-c1">
                            <p style="color:red; font-weight:bold">Enter new password</p>
                            <span class="a1-search-red" style="display:none">User Name already taken <span class="glyphicon glyphicon-remove"></span> </span>
                            <input type="text" name="sugstd_pswrd" placeholder="Enter New Password..." maxlength="20" required>
							<span class="err_msg"></span>
                        </div>          
                        
                        <div class="a1-c1" style="padding-left:25px">
                            <p style="color:red; font-weight:bold">Confirm new password</p>
                            <input type="text" name="cnfrm_pswrd" placeholder="Confirm Change" maxlength="20" required disabled>
                            <span class="glyphicon glyphicon-remove a1-tick-red"></span>
                        </div>         
                        
                        <div class="a1-c1 custom-submit">
                            <button type="submit" class="btn" name="sub_btn" id="a1-ff" disabled>Finished</button>
							<button type="reset" class="btn" onclick="document.getElementById('a1-ff').disabled='disabled'; ">CLEAR</button>
                        </div>          
                        
                    </form>                
                </div>
                
            </div>            
        </main>
		
		<?php include("include/footer.php") ?>
    
</body>   
    
    <script>
        
        //GET SUBMIT BUTTON NODE OBJECT
        const btn_node = document.getElementsByClassName("custom-submit")[0].firstElementChild;     
        //GET INPUT PARENT BOXES CLASS
        const get_class = document.getElementsByClassName("a1-c1");
		
        const box_1 = get_class[0].getElementsByTagName("input"); //NEW NAME INPUT BOX          
		const box_2 = get_class[1].getElementsByTagName("input"); //CONFIRM NEW NAME INPUT BOX
		const tick = get_class[1].getElementsByClassName("glyphicon"); //GET VERIFICATION TICK FIELD		
		
		tick[0].addEventListener("mouseover",function(){ this.style.cursor="pointer" } );		
		
        function check(x){   
				
		const box1_value = box_1[0].value.trim(); //NEW NAME VALUE
		const box2_value = box_2[0].value.trim(); //CONFIRM TEXT VALUE
        
		if(box1_value.length==0 || box1_value==null || box1_value=="undefined"){
                box_2[0].setAttribute("disabled","disabled");
                box_2[0].value="";
                tick[0].setAttribute("class","glyphicon glyphicon-remove a1-tick-red");
               }
			   else{//ASSUMING NEW NAME INPUT BOX ISN'T EMPTY
				   box_2[0].removeAttribute("disabled"); //ENABLE CONFIRM BOX
				   
				   //ENABLE SUBMIT BUTTON IF BOTH INPUT FIELDS ARE A MATCH
				   if(box1_value===box2_value){
					   tick[0].setAttribute("class","glyphicon glyphicon-ok a1-tick-green");
					   btn_node.removeAttribute("disabled");					   
					   
				   }else{
						//IF NOT
						tick[0].setAttribute("class","glyphicon glyphicon-remove a1-tick-red");
						btn_node.setAttribute("disabled","disabled");
				   }
				   
			   }    
			   
        }
		
		
		function verify(obj){
			const input_1 = document.forms.form1.sugstd_pswrd;
			const input_2 = document.forms.form1.cnfrm_pswrd;
			if( input_1.value.trim().length<8 || input_2.value.trim().length<8 ){
				alert("Minimum of 8 characters is required");
				return false;	
			}
			
		}
		
    </script>
    
</html>