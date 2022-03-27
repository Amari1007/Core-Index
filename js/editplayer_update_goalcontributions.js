//this code will update player goals,assists, chances created in database

$(document).ready(function(){
    $("#goal_contributions button").click(function(){
   var id = $("#player_bio #id").val(); //dont change this
   var goals = $("#goal_contributions #goals").val();
   var assists = $("#goal_contributions #assists").val();
   var chances_created = $("#goal_contributions #chances_created").val();
        
   $.post(
       "include/editplayer_update_goalcontributions.php",
       { 
       id:id,
       goals:goals,
       assists:assists,
       chances_created:chances_created
       },
       function(data){
           alert(data);
       }
   );
        

});
    
});