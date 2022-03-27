//this code will update player passing & shooting in database

$(document).ready(function(){
    $("#technical_ability button").click(function(){
   var id = $("#player_bio #id").val(); //dont change this
   var pass_attempt = $("#technical_ability #pass_attempt").val();
   var pass_comp = $("#technical_ability #pass_comp").val();
   var dribble_attempt = $("#technical_ability #dribble_attempt").val();
   var dribble_comp = $("#technical_ability #dribble_comp").val();
   var shots = $("#technical_ability #shots").val();
   
   $.post(
       "include/editplayer_update_technicalability.php",
       { 
       id:id,
       pass_attempt:pass_attempt,
       pass_comp:pass_comp,
       dribble_attempt:dribble_attempt,
       dribble_comp:dribble_comp,
       shots:shots
       },
       function(data){
           alert(data);
       }
   );
        

});
    
});