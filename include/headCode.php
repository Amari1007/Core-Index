<head>   
    <title>CORE Index</title>
    
    <!--META TAGS-->    
    <meta charset="utf-8">     
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="Football Stats"> 
    <meta name="author" content="Chaupi Ghambi"> 
    <meta name="keywords" content="Football, TNM Super League, Football Association of Malawi, Chaupi Ghambi"> 
    
    <!--lOAD JQUERY CSS AND JS FILES-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css">

    <!--lATEST COMPILED AND MINIFIED BOOTSTAP V3 CSS AND JS FILES-->
    <!--BOOTSTAP HAS TO LOAD AFTER JQUERY ALWAYS!!! -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>		
		
    <!--PICTURE ALTERNATIVES JQUERY-->
    <script src="js/player_picture_unavailable.js"></script>
    <script src="js/team_picture_unavailable.js"></script>
    <script src="js/article_picture_unavailable.js"></script>
    

    <!--CUSTOM ICON-->
    <link rel="icon" type="image/x-icon" href="/Icons/icon_feed12.png">
    
    <!--LOCAL CSS AND JS FILES-->
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/positions.css"/>
    <link rel="stylesheet" type="text/css" href="css/dominantfoot.css"/>
    
    <!--NAV SEARCH BOX JQUERY CODE-->
    <script>
        $("document").ready(function(){
            $("#search_box").keypress(function(){
                var data = $("#search_box").val();
                data = data.trim();                               

                if(typeof data === 'undefined') {
                    $("#dropdown_menu ul").html("<li style='padding:10px'> No Results*</li>");
                }else if(data === null){
                    $("#dropdown_menu ul").html("<li style='padding:10px'> No Results**</li>");
                }else if(data === " "){
                    $("#dropdown_menu ul").html("<li style='padding:10px'> No Results***</li>");
                }else if(data === ""){
                    $("#dropdown_menu ul").html("<li style='padding:10px'> No Results****</li>"); 
                }else{		
                    $.post(
                        "include/player_search.php",
                        {
                            data:data
                        },
                        function(data,status){
                            if(status=="success"){
                                $("#dropdown_menu ul").html(data);
                            }else{
                                alert("Error");
                            }						
                        }
                    );
                }

            });
        });
    </script> 
    
</head>