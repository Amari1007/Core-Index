//this code will update player weight,height in database

$(document).ready(function(){
    $("#physical_attributes button").click(function(){
   var id = $("#player_bio #id").val();
   var weight = $("#physical_attributes #weight").val();
   var height = $("#physical_attributes #height").val();

   $.post(
       "include/editplayer_update_physicalattributes.php",
       { 
       id:id,
       weight:weight,
       height:height
       },
       function(data){
           alert(data);
       }
   );
        

});
    
});