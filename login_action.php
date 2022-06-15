<?php
session_start();
include("config.php");
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php

$username = $_POST['userEmail']; 
$password = $_POST['userPwd'];

$sql = "SELECT * FROM users WHERE userEmail='$username' LIMIT 1";
$login_data = $conn->query($sql);

if ($login_data->num_rows == 1) {
	
    $row = $login_data->fetch_assoc();
	
	$message = "Your password is verified! Login is successful! Thank you for filling out the login form,".$username.".";
	$message1 = "Login error, password is incorrect!";
	$message2 = "Login error, username does not exist!";
    
	if (password_verify($_POST['userPwd'],$row['pwdEncrypt'])) {
		
		echo "<script type='text/javascript'>alert('$message');</script>";
        //echo 'Your password is verified!<br>' ;
		//echo "Login is successful! <br> Thank you for filling out the login form, <b>".$username."</b>.<br /><br />";		
		$_SESSION["UID"] = $row["userID"];
		$_SESSION["userRole"] = $row["userRole"];
        $_SESSION["userName"] = $row["userName"];
        header( "refresh:1;url=index.php" );
    } 

    else {
            #echo 'Login error, username or password is incorrect!';
			echo "<script type='text/javascript'>alert('$message1');</script>";
			header( "refresh:1;url=login.html" );
    }
 
		
} 

else {
		$message2 = "Login error, username does not exist!";
		
	    #echo "Login error, username does not exist!";
		echo "<script type='text/javascript'>alert('$message2');</script>";
		header( "refresh:1;url=register.html" );
} 

$conn->close();


?>
</body>
</html>