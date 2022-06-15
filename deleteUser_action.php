<?php
session_start();
include("config.php");

if(isset($_GET['userID']))
{
    $userId = $_GET['userID'];

    $sql = "DELETE FROM users WHERE userID = $userId";

    $deletedUser = $conn->query($sql);	
                
    if($deletedUser) 
    { ?>
        
        <html>
            <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
            <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            <strong>Success</strong>! Account deleted successfully! <a href="manageUser.php"> Back</a>   
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