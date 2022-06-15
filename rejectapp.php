<?php
session_start();
include("config.php");

if(isset($_GET['appID']))
{
    $appId = $_GET['appID'];

    $sql = "UPDATE appointment SET appStatus = 'Rejected' WHERE appID = $appId";

    $deletedAppointment = $conn->query($sql);	
                
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
            <strong>Appointment Rejected! <a href="myAppointment_mentor.php"> Back</a>   
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