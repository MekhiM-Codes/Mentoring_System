<?php
session_start();
include("config.php");

if(isset($_POST['update']))
{
    $userID = mysqli_real_escape_string($conn, $_POST['userID']);
    $userName = mysqli_real_escape_string($conn, $_POST['userName']);
	$user_phone_num = mysqli_real_escape_string($conn, $_POST['user_phone_num']);
    $userEmail = mysqli_real_escape_string($conn, $_POST['userEmail']);
    $userPwd = mysqli_real_escape_string($conn, $_POST['userPwd']);
    
    $sql = "UPDATE users SET userName = '$userName', user_phone_num = '$user_phone_num', userEmail = '$userEmail',  
            userPwd = '$userPwd' WHERE userID = $userID";
    
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
            <strong>Success</strong>! <?php echo $userName ?>'s account details edited successfully! <a href="manageUser.php"> Back</a>   
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