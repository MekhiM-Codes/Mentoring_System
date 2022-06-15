<?php
session_start();
include("config.php");
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
</head>

<body>
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="index.php">FKI E-Mentoring</a></h1>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
		    <li class="nav-item "><a class="active" href="index.php" class="nav-link">Home</a></li>
			<li class="nav-item"><a href="myAppointment.php" class="nav-link">My Appointments</a></li>
			<li class="nav-item"><a href="news.php" class="nav-link">News</a></li>
			<li class="nav-item"><a href="myTarget.php" class="nav-link">My Target GPA</a></li>
			<li class="nav-item"><a href="myAccount.php" class="nav-link">My Account</a></li>
			<li class="nav-item"><a href="logout.php" class="nav-link"> Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
 </header>

  <!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>TARGET CGPA ESTIMATION</h2>
        <p>Fill in the form below to generate your target CGPA estimation.</p>
    </div>
</div><!-- End Breadcrumbs -->
&nbsp

<center>
<br>
<!-- set the action = .py file (your python) -->
  <form method="POST" action="cgpa_prediction.py" enctype="multipart/form-data">
        <table border="0" width="50%">
		
		
			 <tr>
            <td>Matric Number</td>
            <td><input type="text" name="matric_number" size="50"></td>
            </tr>
			&nbsp
            <tr>
            <td>Semester 1 GPA</td>
            <td><input type="text" name="sem1_gpa" size="50"></td>
            </tr>
			&nbsp
            <tr>
            <td>Semester 2 GPA</td>
            <td><input type="text" name="sem2_gpa" size="50"></td>
            </tr>
			&nbsp
            <tr>
            <td>Semester 3 GPA</td>
            <td><input type="text" name="sem3_gpa" size="50"></td>
            </tr>
			&nbsp
			<tr>
			 <td>Semester 4 GPA</td>
            <td><input type="text" name="sem4_gpa" size="50"></td>
            </tr>
			&nbsp
			<tr>
			<td>Semester 5 GPA</td>
            <td><input type="text" name="sem5_gpa" size="50"></td>
            </tr>
			&nbsp
			<tr>
			<td>Semester 6 GPA</td>
            <td><input type="text" name="sem6_gpa" size="50"></td>
            </tr>
			&nbsp
			
            <tr>
            <td>&nbsp;</td>
            <td><br>
                <input class="btn btn-outline-success btn-sm" type="submit" value="Predict"></input>&nbsp;
                <input class="btn btn-outline-dark btn-sm"type="reset" value="Reset">
            </td>
            </tr>
        </table>
		<br>
    </form>
</center>

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