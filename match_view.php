<?php
session_start();
require("include/coreDB.php");

if(!isset($_GET['match_ID'])){
	$conn->close();
    header("Location:leagues.php");
}
else{
    extract($_GET);
	if( isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ){
		require("include/last_activity.php");
	}
}

?>

<!DOCTYPE html>
<html lang="en">
    <?php require("include/headCode.php") ;?>    
    <head>
    <link rel="stylesheet" type="text/css" href="css/league_selectedphp/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/matchviewphp/style.css"/>
    
    <script>
        $(document).ready(function(){
            //the code below will change the styling of the buttons in #teams

            //default styling
            $('#match_stats').css({"background-color":"#e8491d","color":"white","border":"0px solid white"});

            $('#match_stats').click(function(){
               $(this).css({"background-color":"#e8491d","color":"white"});
               $('#line_ups').css({"background-color":"white","color":"black","border":"0px solid white"});
            });

             $('#line_ups').click(function(){
               $(this).css({"background-color":"#e8491d","color":"white"});
               $('#match_stats').css({"background-color":"white","color":"black","border":"0px solid white"});
            });

        });        

    </script>
    
    <script>
        $(document).ready(function(){
            $('#bars').load("include/match_facts_retrieve.php?match_ID=<?php echo $match_ID?>");
            
            $('#match_stats').click(function(){
                $('#bars').load("include/match_facts_retrieve.php?match_ID=<?php echo $match_ID?>");
            })
            
            $('#line_ups').click(function(){
                $('#bars').load("include/match_lineups_retrieve.php?match_ID=<?php echo $match_ID?>");
            })
               
        });
     </script>
    </head>

    <body dir="ltr">
        
    <?php require("include/header.php") ?>
        
    <?php require("include/league_navtab.php") ?>
    
    <main>  
	
        <?php 
            require("include/retrieve_match_header.php");
        ?>   
        
        <div id="vote-block">
            <?php 
                require("include/check_vote_history.php");
            ?>   
        </div>
        
        <script>
            $(document).ready(function(){
               $("div #vote-block-1 .btn").click(function(){    
                   
                   //determine button clicked
                   var vote_clicked = $(this).val();
                   
                   //default vote values
                   var home_add = 0; 
                   var draw_add = 0;
                   var away_add = 0;                   
                   
                   //assign vote based on button clicked
                   if(vote_clicked == "home"){
                          home_add = 1;
                      }
                   else if(vote_clicked == "draw"){
                           draw_add = 1;
                   }
                   else if(vote_clicked == "away"){
                           away_add = 1;
                   }
                   
                   //send vote to database
                   $.post(
                       "include/get_votes.php",
                       {
                           match_ID: <?php echo isset($match_ID)?$match_ID:Null; ?>,
                           user_id: <?php echo isset($_SESSION['user_id'])?$_SESSION['user_id']:999999999999; ?>,
                           user_name: " <?php echo isset($_SESSION['user_name'])?$_SESSION['user_name']:Null; ?> ",
                           home_add: home_add,
                           draw_add: draw_add,
                           away_add: away_add
                           
                       },
                       function(data,status,obj){
                           if(status=='success'){
                              $("#vote-block").html(data);
                               location.reload();//reload page every time after vote
                                  
                           }else{
                              $("#vote-block").html("<h3>An error occured</h3>");
                              
                           }
                       
                       }
                       
                   );
                   
               });
                
            });
        
        </script>
        
			<?php 
				require("include/retrieve_match_info_box.php");
			?> 
        
        <div id="comments-box">
            <div id="comments-box-header"> <span class='text-danger'> <?php $rows = $conn->query("SELECT * FROM `user_comments`  WHERE `event_id`={$_GET['match_ID']} "); echo count($rows->fetch_all() ); $conn->close(); ?> </span> Comments</div>
			
			<div id='comments-box-insert'> 
				<div id='user-pic'> <img src='Media/Icons/user-icon.png' width='40px' onerror='player_imgerror(this)'> </div>				
				<div id='insert-comment'>
					<div id='comment-insert-form'>
						<!-- try changing from input to textarea onfocus -->
						<div id='comment-insert-textarea' contenteditable='true' name='user_comment' onkeyup='user_typing(this)' placeholder='Leave a comment' rows='2' cols='70' value='' dir='ltr'>Leave a comment</div>
						<button id='comment-insert-form-btn' type='submit' onclick='input_submit(this)' disabled class='btn btn-success'>Reply</button> 
					</div>
				</div>				
			</div>
			
			<div id="comments-box-inner">
			<!-- Comments will come under here -->
			
			<?php 
				require("include/coreDB.php");				
				
				if($comm_retrieve = $conn->query(" SELECT * FROM `user_comments` WHERE `event_id`={$_GET['match_ID']} ORDER BY comment_date DESC, unix_time*1 DESC LIMIT 20 ") ){
					if($comm_retrieve->num_rows > 0){
						while($comm_response = $comm_retrieve->fetch_assoc()){
							$unix_time = (int)$comm_response['unix_time'];							
							
							if( time()-$unix_time<=3600 ){								
								if( time()-$unix_time>60 && time()-$unix_time<3600 ){
									/*ABOUT AN HOUR*/
									$comment_time = (int) ((time()-$unix_time )/60 )." minutes ago";
								}
								else if( time()-$unix_time<=60 ){
									/*LESS THAN A MINUTE*/
									$comment_time = "Just now";
								}
								
							}else{
								if( time()-$unix_time>=3600 && time()-$unix_time ){
									$comment_time = (int)( (time()-$unix_time)/3600 )." hours ago";
								}else{
									/*FULL TIME*/
									$comment_time = date("d M y | H:i A",$unix_time);
								}
							}
							
							echo("
								<div class='comments-box-user'> 
									<div class='comments-user-pic'> <img src='Media/Icons/user-icon.png' width='30px' onerror='player_imgerror(this)'> </div>
									<div class='user-comments-enclosure'>
										<div class='comments-user-info'> <span>&bull; {$comm_response['user_name']} &bull;</span> <code class='text-danger'>{$comment_time}</code> </div>
										<div class='comments-user-comment'>{$comm_response['comment_data']}</div>
									</div>
								</div>
							");
							
						}
					}
				}
			
			?>
			
			</div>			
		</div>
        
    </main>
    
	<script> 
		function user_typing(obj){
			const comm_btn = document.getElementById('comment-insert-form-btn');
			const user_comment = obj.value.trim();
			if(user_comment=="" || obj.value == 'undefined'){
				//DISABLE BUTTON IF INPUT FIELD IS EMPTY
				comm_btn.disabled = 'true';
			}
			else if(user_comment != '' || user_comment != 'undefined'){
				comm_btn.removeAttribute('disabled');
			}
			
		}
		
		function input_submit(obj){
			//const get_form = document.getElementById('comment-insert-form');
			const user_input = document.getElementById('comment-insert-textarea');
			http_send_comment(user_input,"POST","include/process_user_comments.php");
		}
		
		function http_send_comment(x_input,method, url){
			const xhttp = new XMLHttpRequest();
			xhttp.open(method,url,true);
			xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			const data = "user_comment="+x_input.value+"&match_ID= <?php echo isset($_GET['match_ID'])?$_GET['match_ID']:"chaupi"; ?> ";
			xhttp.send(data);
			xhttp.onreadystatechange = function(){
				if(this.status==200 && this.readyState==4){
					
					if(parseInt(this.responseText)==1){ //SUCCESSFULL
						location.reload();
					}
					else if(parseInt(this.responseText)==2){
						alert("An error occured in the database");
					}else{
						alert("Error: "+this.responseText);
					}
					
				}else if(this.status==404){
					alert("File not found");
				}
				
			}
			
		}
		
	</script>
	
   <?php include("include/footer.php"); ?>

    </body>    
</html>


