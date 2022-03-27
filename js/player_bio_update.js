//this code will update player fname,lname,age,position,club,kit in database

$(document).ready(function(){
    $("#player_bio button").click(function(){
   var id = $("#player_bio #id").val();
   var fname = $("#player_bio #fname").val();
   var lname = $("#player_bio #lname").val();
   var age = $("#player_bio #age").val();
   var position = $("#player_bio #position").val();
   var kit = $("#player_bio #kit").val();

   $.post(
       "include/editplayer_update_playerbio.php",
       { 
       id:id,
       fname:fname,
       lname:lname,
       age:age,
       position:position,
       kit:kit
       },
       function(data){
           alert(data);
       }
   );
        

});
    
});