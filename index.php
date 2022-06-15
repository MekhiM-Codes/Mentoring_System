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
  <meta content="" name="description">
  <meta content="" name="keywords">


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

      <h1 class="logo me-auto"><a href="index.html">FKI E-Mentoring</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>

<?php 
if(isset($_SESSION["UID"])) {

if ($_SESSION["userRole"] == 1) { ?>

	<li class="nav-item"><a href="manageUser.php" class="nav-link">All Users</a></li>
	<li class="nav-item"><a href="manageMentor.php" class="nav-link">All Mentors</a></li>
	<li class="nav-item"><a href="manageAppointment.php" class="nav-link">All Appointments</a></li>
	<li class="nav-item"><a href="manageNews.php" class="nav-link">All News</a></li>
	<li class="nav-item"><a href="manageTarget.php" class="nav-link">Target</a></li>
	<li class="nav-item"><a href="manageReport.php" class="nav-link">Reports</a></li>
	<li class="nav-item"><a href="logout.php" class="nav-link"> Welcome, <?php echo $_SESSION['userName'] ?>  | Logout</a></li>


<?php 
}

else if ($_SESSION["userRole"] == 2)
{ ?>

	<li class="nav-item "><a class="active" href="index.php" class="nav-link">Home</a></li>
    <li class="nav-item"><a href="myAppointment.php" class="nav-link">My Appointments</a></li>
    <li class="nav-item"><a href="news.php" class="nav-link">News</a></li>
	<li class="nav-item"><a href="myTarget.php" class="nav-link">My Target GPA</a></li>
    <li class="nav-item"><a href="myAccount.php" class="nav-link">My Account</a></li>
    <li class="nav-item"><a href="logout.php" class="nav-link"> Welcome, <?php echo $_SESSION['userName'] ?>  | Logout</a></li>

<?php 
}

else if ($_SESSION["userRole"] == 3)
{ ?>

	<li class="nav-item "><a class="active" href="index.php" class="nav-link">Home</a></li>
    <li class="nav-item"><a href="myAppointment_mentor.php" class="nav-link">My Appointments</a></li>
    <li class="nav-item"><a href="news.php" class="nav-link">News</a></li>
    <li class="nav-item"><a href="myAccount.php" class="nav-link">My Account</a></li>
	<li class="nav-item"><a href="mentorDetails.php" class="nav-link">Mentor Details</a></li>
    <li class="nav-item"><a href="logout.php" class="nav-link"> Welcome, <?php echo $_SESSION['userName'] ?>  | Logout</a></li>
	
<?php 
}
}

else
{ ?>	
	<li class="nav-item "><a class="active" href="index.php" class="nav-link">Home</a></li>	
	 <li class="nav-item"><a href="login.html" class="nav-link">Login</a></li>	
	<li class="nav-item active"><a href="register.html" class="nav-link">New Registeration</a></li>
	
<?php
}
?>

</ul>
	<i class="bi bi-list mobile-nav-toggle"></i>
</nav>
</div>
</header>

<section id="hero" class=" justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Faculty Of Computing & Informatics</h1>&nbsp;
      <h2>A centre of excellence, creative and innovative faculty through computing and informatics technology.</h2>
    </div>
  </section>
     &nbsp;
	 
<section id="trainers" class="trainers">
<div class= "container"  data-aos="fade-up" >
<div class="card-group">
<?php
		$sql = "SELECT * FROM mentors order by mentorID ASC";

		$hs_list = $conn->query($sql);

		if ($hs_list->num_rows > 0) {

			while($row = $hs_list->fetch_assoc()) { ?>

          <div class="col-md-2 col-md-4 d-flex align-items-stretch">
            <div class="member" >
								<img src="<?php echo $row['mentorImg']; ?>" class="img-fluid"/>
									<div class="member-content">
										<h4><?php echo $row["mentorName"]; ?></h4>
										<span><?php echo $row["mentor_phone_num"]; ?></span>
										<span><?php echo $row["mentorEmail"]; ?></span>
										<p><?php echo $row["mentorEdu"]; ?></p>
									</div>

<?php 
if(isset($_SESSION["UID"])) {

if ($_SESSION["userRole"] == 2) { ?>

						<center>
						<a 
							href="fkiBooking.php?mentorID=<?php echo $row['mentorID']?>">
							<button class="btn btn-outline-dark btn-sm">Book an Appointment</button>
						</a>
						</center>

<?php 
}
}

?>

				</div>
				</div>
<?php
			}
		}

else {
		echo "0 results";
}

$conn->close();

?>
		</div>
	</div>
</section>	
  

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>FKI E-Mentoring Admin</h3>
            <p>
              Faculty Of Computing and Informatics<br>
              Univerity Malaysia Sabah<br>
              Sabah, Malaysia <br><br>
              <strong>Phone:</strong>0194914108<br>
              <strong>Email:</strong>fkimentoringums@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="http://fki.ums.edu.my/fki/">FKI UMS Website</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://smp.ums.edu.my/">SMP UMS Website</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://smartv3.ums.edu.my/">SMART V3 UMS Website</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>FKI Courses</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Software Engineering</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Network Engineering</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Multimedia Technology</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Business Computing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Data Science</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>FKI Mentoring Programme</h4>
            <p>"Providing a platform for students to connect with their mentors."</p>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>FKI E-Mentoring</span></strong>. All Rights Reserved
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->
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


	
	
	
	
	
	
	
	
	
	
	
	
	
	
