<?php
include("config.php");

    $newsID = $_GET['newsID'];

    $sql = "SELECT * FROM news WHERE newsID = $newsID";

    $result = $conn->query($sql);	

    if (mysqli_num_rows($result) > 0) {
                        
        while($row = mysqli_fetch_assoc($result)) { 

            $newsTitle = $row['newsTitle'];
            $newsDetail = $row['newsDetail'];
			$newsExtra = $row['newsExtra'];
			$newsImg = $row['newsImg'];
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
        <h2>EDIT NEWS DETAILS</h2>
        <p>Change the information of the selected news here.</p>
    </div>
</div><!-- End Breadcrumbs -->
&nbsp;

<center>
    <form method="POST" action="editNews_action.php" enctype="multipart/form-data">
        <table border="0" width="50%">
            <tr>
            <td>Title</td>
            <td><input type="text" name="newsTitle" size="50" value="<?php echo $newsTitle?>" required></td>
            </tr>

            <tr>
            <td>News Detail</td>
            <td><textarea input type="text" name="newsDetail" rows="10" cols="50"><?php echo $newsDetail?></textarea required></td>
            </tr>
			
			<tr>
            <td>Extra Info</td>
            <td><input type="text" name="newsExtra" size="50" value="<?php echo $newsExtra?>" required></td>
            </tr>

			<tr>
            <td>News Image </td>
            <td><input type="file" name="newsImg" id="newsImg" value="<?php echo $newsImg?>" required></td>
            </tr>
			
            <tr>
            <td>&nbsp;</td>&nbsp;
            <td>
				</br>
                <input type="hidden" name="newsID" value="<?php echo $newsID; ?>">
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