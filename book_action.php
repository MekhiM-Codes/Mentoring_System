<?php
session_start();
include("config.php");

if(isset($_POST['Submit'])) {
  
  	$userID = $_SESSION["UID"]; 
	$mentorID = $_POST['mentorID']; 
	$userName = $_POST['userName']; 
	$appDetail = $_POST['appDetail'];
	$menteeContact = $_POST['menteeContact'];
	$appChoice = $_POST['appChoice'];
	$appDate = $_POST['appDate'];
	$appTime = $_POST['appTime'];
	 
	$sql = "INSERT INTO appointment (userID, mentorID, userName, appDetail, menteeContact, appChoice, appDate, appTime, appStatus) 
	        VALUES ('" . $userID . "','" . $mentorID . "','" . $userName . "','" . $appDetail . "','" . $menteeContact . "','" . $appChoice . "', '".$appDate."', '".$appTime."', 'Pending')";

	        $newBooking = $conn->query($sql);	
	        
	        if($newBooking) {

	            echo 'New appointment record created successfully! Please wait for approvement from your mentor. <a href="index.php">Back</a>';

	        }

	        else {
	                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	        }
}
?>