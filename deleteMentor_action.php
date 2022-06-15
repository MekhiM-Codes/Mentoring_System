<?php
session_start();
include("config.php");

if(isset($_GET['mentorID']))
{
    $mentorId = $_GET['mentorID'];

    $sql = "DELETE FROM mentors WHERE mentorID = $mentorId";

    $deletedMentor = $conn->query($sql);	
                
    if($deletedMentor) 
    { ?>
        
        <html>
            <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
            <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            <strong>Success</strong>! Mentor deleted successfully! <a href="manageMentor.php"> Back</a>   
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