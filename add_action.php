<?php
session_start();
include("config.php");

if(!isset($_SESSION["UID"])) 
	header("location:login.html");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>FKI E-Mentoring</title>
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <?php
    
    $target_dir = "mentorImg/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $sql = "INSERT INTO mentors (mentorName, mentorEmail, mentor_phone_num, mentorImg, mentorEdu, userID) 
            VALUES ('" . $_POST["mentorName"] . "',
            '". $_POST["mentorEmail"] . "',
            '". $_POST["mentor_phone_num"] . "',
            '". $target_file . "',
            '". $_POST["mentorEdu"] . "',
            '". $_SESSION["UID"]. "')";
            

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } 
        
        else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
 
    /*if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }*/

    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
   
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    
    } 
    
    else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            
                $newMentor = $conn->query($sql);

                if ($newMentor) { ?>

                <html>
                <head>
					<meta charset="utf-8">
					<meta content="width=device-width, initial-scale=1.0" name="viewport">
					<title>FKI E-Mentoring</title>
					<link href="assets/css/style.css" rel="stylesheet">
                </head>
                
                <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <strong>Success</strong>! New mentor added successfully! <a href="index.php"> Back</a>   
                </div>
                <html>
                <br>

                <?php			
                }

                else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                }	

                $conn->close(); ?>

                <html>
                <head>
					<meta charset="utf-8">
					<meta content="width=device-width, initial-scale=1.0" name="viewport">
					<title>FKI E-Mentoring</title>
					<link href="assets/css/style.css" rel="stylesheet">
                </head>
                
                <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <strong>Success</strong>! File has been uploaded.<a href="index.php"> Back</a>   
                </div>
                <html>

                <?php
            } 
        
            else {
                    echo "Sorry, there was an error uploading your file.<br>";
        }	

        //header("location:index.php");
    }

    ?>
</body>
</html>
