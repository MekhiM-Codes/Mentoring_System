<?php
session_start();
include("config.php");

if(isset($_GET['newsID']))
{
    $newsId = $_GET['newsID'];

    $sql = "DELETE FROM news WHERE newsID = $newsId";

    $deletedNews = $conn->query($sql);	
                
    if($deletedNews) 
    { ?>
        
        <html>
            <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
            <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            <strong>Success</strong>! News deleted successfully! <a href="manageNews.php"> Back</a>   
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