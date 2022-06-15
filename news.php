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
	  
<?php 
if(isset($_SESSION["UID"])) {

if ($_SESSION["userRole"] == 2) { ?>

	<li class="nav-item "><a class="active" href="index.php" class="nav-link">Home</a></li>
    <li class="nav-item"><a href="myAppointment.php" class="nav-link">My Appointments</a></li>
    <li class="nav-item"><a href="news.php" class="nav-link">News</a></li>
	<li class="nav-item"><a href="myTarget.php" class="nav-link">My Target GPA</a></li>
    <li class="nav-item"><a href="myAccount.php" class="nav-link">My Account</a></li>
    <li class="nav-item"><a href="logout.php" class="nav-link"> Logout</a></li>


<?php 
}

else if($_SESSION["userRole"] == 3)
{ ?>

	<li class="nav-item "><a class="active" href="index.php" class="nav-link">Home</a></li>
    <li class="nav-item"><a href="myAppointment_mentor.php" class="nav-link">My Appointments</a></li>
    <li class="nav-item"><a href="news.php" class="nav-link">News</a></li>
    <li class="nav-item"><a href="myAccount.php" class="nav-link">My Account</a></li>
	<li class="nav-item"><a href="mentorDetails.php" class="nav-link">Mentor Details</a></li>
    <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>

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
  <!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>NEWS</h2>
        <p>Below are the recent news in UMS and FKI as well as the recent events held by FKI</p>
    </div>
</div><!-- End Breadcrumbs -->
&nbsp;

 <section id="events" class="events">
      <div class="container" data-aos="fade-up">
		 <div class="row">
		 
<?php
		$sql = "SELECT * FROM news order by newsID ASC";

		$hs_list = $conn->query($sql);

		if ($hs_list->num_rows > 0) {

			while($row = $hs_list->fetch_assoc()) { ?>
			
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
				<img src="<?php echo $row['newsImg']; ?>" class="img-fluid"/>
			 </div>
			 <div class="card-body">
			 <h5 class="card-title text-center"><b><?php echo $row["newsTitle"]; ?></b></h5>
			 <p class="fst-italic text-center"><?php echo $row["newsExtra"]; ?></p>
			 <p class="card-text"><?php echo $row["newsDetail"]; ?></p>
			</div>
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