<?php 
session_start();
require_once("coreDB.php"); //connect to Core database

//check if post method was used
if($_SERVER['REQUEST_METHOD']=='POST'){
    extract($_POST);
}

//check if no duplicate data is already in database
if($result = $conn->query("SELECT * FROM players WHERE fname='$fname' AND lname='$lname' AND nationality='$nationality' AND club='$club' LIMIT 1")){
    if($result->num_rows > 0){
        header("Location:../addplayer.php?message= Error: Player already exists");
        $conn->close();
        exit();
    }
}

/**********************FOR PLAYER PICTURE*************************/
if(isset($add_button)){
    if(isset( $_FILES['pic']['name']) ){
    $picname = $_FILES['pic']['name'];
    $pictmp = $_FILES['pic']['tmp_name'];
    $picsize = $_FILES['pic']['size'];
    $picerror = $_FILES['pic']['error'];
    $pictype = $_FILES['pic']['type'];
    
    $picext = explode('.',$picname); //seperate file name by '.'
    $getext = strtolower(end($picext));
    
    $allowedext = array('jpg','jpeg','webp','png'); //allowed file extensions
    $dbpicdestination = " ";
    if(in_array($getext, $allowedext) ){
        if($picerror === 0 ){
            if($picsize < 10000000){
                //if picture size is less than 10000000 bytes = 10Mb
                $picnameNew = "$fname.$lname.$getext";
                $picdestination = "../Media/Players/$picnameNew";
                $dbpicdestination = "Media/Players/$picnameNew";
                move_uploaded_file($pictmp,$picdestination);   
                
                $sql = "INSERT INTO players(fname,lname,position,age,nationality,club,player_pic) 
                VALUES('$fname', '$lname', '$position', $age, '$nationality', '$club', '$dbpicdestination' ) ";

                if($conn->query($sql)){
                    header("Location:../addplayer.php?message=$fname $lname successfully added *");
                    $conn->close();
                    exit();
                }  
                
            }else{
         header("Location:../addplayer.php?message=Player image too big; Player wasn't added");
         $conn->close();
         exit();                
            }            
        }else{            
         header("Location:../addplayer.php?message=An error occured while uploading player picture: Player wasn't added");
         $conn->close();
         exit();    
        }        
    }else{
         header("Location:../addplayer.php?message=Image format unsupported; Player wasn't added=$pictype");
         $conn->close();
         exit();
    } 
    }
    else{
       
    //$dbpicdestination = null;
        
    //if picture isnt set 
    $sql = "INSERT INTO players(fname,lname,position,age,nationality,club,player_pic) 
    VALUES('$fname', '$lname', '$position', $age, '$nationality', '$club', '$dbpicdestination' ) ";

    if($conn->query($sql)){
        header("Location:../addplayer.php?message=$fname $lname was successfully added **");
        $conn->close();
        exit();
    }
        
    }
    
}

$conn->close();//closes connection to database this file's connection to the database.
?>