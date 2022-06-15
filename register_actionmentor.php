<?php
	include("config.php");
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php
    function validateInput($data, $fieldName) 
    {
        global $errorCount;

        if (empty($data)) {

            displayRequired($fieldName);
            ++$errorCount;
            $retval = "";
        } 

        else { 	
            
            if($fieldName == "Guest Email") {

                if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {

                        $errorCount++;
                        echo("$data is not a valid email address <br />");
                }
            }
            
        
            $retval = trim($data);
            $retval = stripslashes($retval);
        }
        
        return($retval);
    }

    function displayRequired($fieldName) 
    {
        echo "The field \"$fieldName\" is required.<br />\n";
    }

    $errorCount = 0;
    $guestName = validateInput($_POST['userName'], "Name");
	$guestphonenum = validateInput($_POST['user_phone_num'], "Number"); 	
    $guestEmail = validateInput($_POST['userEmail'], "Email"); 
    $guestPwd = validateInput($_POST['userPwd'], "Password");

    if ($errorCount>0) {

        echo "Please use the \"Back\" button to re-enter the data.<br />\n";
    }

    else {

        echo "Thank you for filling out the registration form, <b>".$guestName."</b>. <br /></br>";
        
        $sql = "SELECT * FROM users WHERE userEmail='$guestEmail' AND userPwd='$guestPwd' LIMIT 1";	
        
        $userExist = $conn->query($sql);
        
        if ($userExist->num_rows == 1) {

            echo "<p><b>Error:</b> User already exist, cannot register!</p>";		
        } 

        else {
                    
            $pwdHash = trim(password_hash($_POST['userPwd'], PASSWORD_DEFAULT)); 
            
            
            $sql = "INSERT INTO users (userName, user_phone_num, userEmail, userPwd, userRole, pwdEncrypt) 
                    VALUES ('" . $guestName . "','" . $guestphonenum . "','" . $guestEmail . "','" . $guestPwd . "','" . '3' . "', '".$pwdHash."')";

            $newUser = $conn->query($sql);	
            
            if($newUser) {

                echo "New record created successfully!";		
            }

            else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            
        }
    }

    mysqli_close($conn);

?>

</body>
</html>