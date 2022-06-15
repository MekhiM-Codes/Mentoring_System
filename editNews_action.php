<?php
session_start();
include("config.php");

if(isset($_POST['update']))
{
    $target_dir = "newsImg/";
    $target_file = $target_dir . basename($_FILES["newsImg"]["name"]);
	
	$newsID = mysqli_real_escape_string($conn, $_POST['newsID']);
    $newsTitle = mysqli_real_escape_string($conn,  $_POST['newsTitle']);
    $newsDetail = mysqli_real_escape_string($conn,  $_POST['newsDetail']);
    $newsExtra = mysqli_real_escape_string($conn,  $_POST['newsExtra']);
   
    $sql = "UPDATE news 
            SET newsTitle = '$newsTitle', newsDetail = '$newsDetail',  
                newsExtra = '$newsExtra', newsImg = '$target_file'
            WHERE newsID = $newsID";
    
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
            <strong>Success</strong>! <?php echo $newsTitle ?> edited successfully! <a href="manageNews.php"> Back</a>   
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