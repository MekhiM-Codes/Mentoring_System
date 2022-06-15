<?php
session_start();
include("config.php");

if(isset($_POST['update']))
{
 
	
	$appID = mysqli_real_escape_string($conn, $_POST['appID']);
    $appDetail = mysqli_real_escape_string($conn,  $_POST['appDetail']);
	$menteeContact = mysqli_real_escape_string($conn,  $_POST['menteeContact']);
    $appChoice = mysqli_real_escape_string($conn,  $_POST['appChoice']);
    $appDate = mysqli_real_escape_string($conn,  $_POST['appDate']);
	$appTime = mysqli_real_escape_string($conn,  $_POST['appTime']);
   
    $sql = "UPDATE appointment 
            SET appDetail = '$appDetail', menteeContact = '$menteeContact', appChoice = '$appChoice',  
                appDate = '$appDate', appTime = '$appTime'
            WHERE appID = $appID";
    
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
            <strong>Success! Appointment number</strong> <?php echo $appID ?> edited successfully! <a href="index.php"> Back</a>   
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