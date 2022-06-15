<?php
session_start();
include("config.php");

if(isset($_GET['appID']))
{
    $appId = $_GET['appID'];

    $sql = "DELETE FROM appointment WHERE appID = $appId";

    $deletedAppointment = $conn->query($sql);	
                
    if($deletedAppointment) 
    { ?>
        
        <html>
            <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
            <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            <strong>Success</strong>! Appointment deleted successfully! <a href="index.php"> Back</a>   
       </div>
       <html>

    <?php
}

else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
}

?>