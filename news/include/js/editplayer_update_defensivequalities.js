//this code will update player defensive ability in database

$(document).ready(function(){
    $("#defensive_qualities button").click(function(){
   var id = $("#player_bio #id").val(); //dont change this
   var tackle_attempt = $("#defensive_qualities #tackle_attempt").val();
   var tackle_comp = $("#defensive_qualities #tackle_comp").val();
   var aerials_contested = $("#defensive_qualities #aerials_contested").val();
   var aerials_won = $("#defensive_qualities #aerials_won").val();
   var interceptions = $("#defensive_qualities #interceptions").val();
   var clean_sheets = $("#defensive_qualities #clean_sheets").val();
   
   $.post(
       "include/editplayer_update_defensiveability.php",
       { 
       id:id,
       tackle_attempt:tackle_attempt,
       tackle_comp:tackle_comp,
       aerials_contested:aerials_contested,
       aerials_won:aerials_won,
       interceptions:interceptions,
       clean_sheets:clean_sheets
       },
       function(data){
           alert(data);
       }
   );
        

});
    
});
