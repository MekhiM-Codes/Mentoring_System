<?php
session_start();
include("config.php");

if(isset($_POST['update']))
{
    $target_dir = "mentorImg/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	
	$mentorID = mysqli_real_escape_string($conn, $_POST['mentorID']);
    $mentorName = mysqli_real_escape_string($conn,  $_POST['mentorName']);
    $mentorEmail = mysqli_real_escape_string($conn,  $_POST['mentorEmail']);
    $mentor_phone_num = mysqli_real_escape_string($conn,  $_POST['mentor_phone_num']);
	$mentorEdu = mysqli_real_escape_string($conn,  $_POST['mentorEdu']);
   
    $sql = "UPDATE mentors 
            SET mentorName = '$mentorName', mentorEmail = '$mentorEmail',  
                mentor_phone_num = '$mentor_phone_num', mentorEdu = '$mentorEdu', mentorImg = '$target_file'
            WHERE mentorID = $mentorID";
    
    $result = $conn->query($sql);	
                
    if($result) { ?>

        <html>
            <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
            <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            <strong>Success</strong>! <?php echo $mentorName ?> edited successfully! <a href="Index.php"> Back</a>   
       </div>
       <html>

    <?php 
    }

    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>