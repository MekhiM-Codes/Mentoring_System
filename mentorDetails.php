<?php
session_start();
include("config.php");

    $userID = $_SESSION["UID"];

    $sql = "SELECT * FROM mentors WHERE userID = $userID";

    $result = $conn->query($sql);	

    if (mysqli_num_rows($result) > 0) {
                        
        while($row = mysqli_fetch_assoc($result)) { 

            $mentorName = $row['mentorName'];
            $mentorEmail = $row['mentorEmail'];
			$mentor_phone_num = $row['mentor_phone_num'];
			$mentorEdu = $row['mentorEdu'];
			$mentorImg = $row['mentorImg'];
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FKI E-Mentoring</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
  
  /* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 10px 15px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 500px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=file]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 10px 10px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:2px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
  
  </style>
</head>

<body>
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">FKI E-Mentoring</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
         <li class="nav-item "><a class="active" href="index.php" class="nav-link">Home</a></li>
		 <li class="nav-item"><a href="myAppointment_mentor.php" class="nav-link">My Appointments</a></li>
		 <li class="nav-item"><a href="news.php" class="nav-link">News</a></li>
		 <li class="nav-item"><a href="myAccount.php" class="nav-link">My Account</a></li>
		 <li class="nav-item"><a href="mentorDetails.php" class="nav-link">Mentor Details</a></li>
		 <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
 </header>
  <!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>EDIT MENTOR DETAILS</h2>
        <p>Change the information of the the mentor here.</p>
    </div>
</div><!-- End Breadcrumbs -->
&nbsp;

<center>
    <form method="POST" action="editMentor_action.php" enctype="multipart/form-data">
        <table border="0" width="50%">
            <tr>
            <td>Mentor Name</td>
            <td><input type="text" name="mentorName" size="50" value="<?php echo $mentorName?>" required></td>
            </tr>
			
			<tr>
            <td>Mentor Email</td>
            <td><input type="text" name="mentorEmail" size="50" value="<?php echo $mentorEmail?>" required></td>
            </tr>
            <tr>
			
            <td>Mentor Phone Number</td>
            <td><input type="text" name="mentor_phone_num" size="50" value="<?php echo $mentor_phone_num?>" required></td>
            </tr>
			
            <tr>
            <td>Mentor Description</td>
            <td><textarea input type="text" name="mentorEdu" rows="10" cols="50"><?php echo $mentorEdu?></textarea required></td>
            </tr>
			
            <tr>
            <td>&nbsp;</td>&nbsp;
            <td>
				</br>
                <input type="hidden" name="userID" value="<?php echo $userID; ?>">
            </tr>
        </table>
    </form>
</center>


  <!-- Add mentor details as a mentor -->
<button class="open-button" onclick="openForm()">Add Mentor Details</button>

<div class="form-popup" id="myForm">
  <form method="POST" action="add_action.php" enctype="multipart/form-data" class="form-container">
        <table border="0" width="50%">
            <tr>
            <td><input type="text" name="mentorName" required placeholder="Enter your name" size="50"></td>
            </tr>

            <tr>
            <td><input type="text" name="mentorEmail" required placeholder="Enter your email" size="50"></td>
            </tr>
            <tr>

            <td><input type="text" name="mentor_phone_num" required placeholder="Enter your phone number" size="50"></td>
            </tr>

            <tr>
            <td><textarea input type="text" name="mentorEdu" rows="5" required placeholder = "Enter your brief introduction" cols="50"></textarea></td>
            </tr>

            <tr>
             <label for="mentorImage"><b>Mentor Image</b></label>
            <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
            </tr>

            <tr>
            <td>&nbsp;</td>
			</table>
                <input class="btn btn-outline-success btn-sm" type="submit" value="Submit Your Details"></input>
				<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
			</form>
		<br>
    </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
 
<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>