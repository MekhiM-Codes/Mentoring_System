<?php
include("config.php");

    $appID = $_GET['appID'];

    $sql = "SELECT * FROM appointment WHERE appID = $appID";

    $result = $conn->query($sql);	

    if (mysqli_num_rows($result) > 0) {
                        
        while($row = mysqli_fetch_assoc($result)) { 

            $appDetail = $row['appDetail'];
			$menteeContact = $row['menteeContact'];
            $appChoice = $row['appChoice'];
			$appDate = $row['appDate'];
			$appTime = $row['appTime'];
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
</head>

<body>

  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">FKI E-Mentoring</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
        <li class="nav-item"><a href="manageUser.php" class="nav-link">All Users</a></li>
		<li class="nav-item"><a href="manageMentor.php" class="nav-link">All Mentors</a></li>
		<li class="nav-item"><a href="manageAppointment.php" class="nav-link">All Appointments</a></li>
		<li class="nav-item"><a href="manageNews.php" class="nav-link">All News</a></li>
		<li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
 </header>

  <!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>EDIT APPOINTMENT DETAILS</h2>
        <p>Change the information of the selected appointment here.</p>
    </div>
</div><!-- End Breadcrumbs -->
&nbsp;

<center>
    <form method="POST" action="editAppointment_action.php" enctype="multipart/form-data">
        <table border="0" width="50%">
            <tr>
            <td><b>Appointment Details : </b></td>
            <td><input type="text" name="appDetail" size="50" value="<?php echo $appDetail?>" required></td>
            </tr>
			
			<tr>
            <td><b>Contact Number : </b></td>
            <td><input type="text" name="menteeContact" size="50" value="<?php echo $menteeContact?>" required></td>
            </tr>

            <tr>
			<td>
            	<div class="form-row" required>
				<b><p>Type of Appointment :</p></b>
				<input type="radio" name="appChoice" value="Online" id="Online">
				<label for="online" style="color:black;"> Online</label>
				<br>
				<input type="radio" name="appChoice" value="Offline" id="Offline">
				<label for="offline" style="color:black;"> Offline</label>
				</div>
				<br>
			</td>
            </tr>
			
			<tr>
			<td>
            	<div class="form-group">
					<b><p>Appointment Date :</p></b>
					<div class="form-field">		
					<input type="date" class="form-control" placeholder="appointment date" name="appDate" value="<?php echo $appDate?>" required>
				</div>
			</div><br>
			</td>
            </tr>

			<tr>
			<td>
              <div class="form-group">
					<b><p>Appointment Time :</p></b>
					<div class="form-field">		
					<input type="time" class="form-control" placeholder="appointment time" name="appTime" value="<?php echo $appTime?>">
				</div>
			</div>
			</td>
            </tr>
			
            <tr>
            <td>&nbsp;</td>&nbsp;
            <td>
				</br>
                <input type="hidden" name="appID" value="<?php echo $appID; ?>">
                <input class="btn btn-outline-primary btn-sm" type="submit" value="Submit" name="update">&nbsp;
                <input  class="btn btn-outline-dark btn-sm" type="reset" value="Reset">
            </tr>
        </table>
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