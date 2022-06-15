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
        <h2>BOOK AN APPOINTMENT</h2>
        <p>Fill in the form below to book an appoinment with this mentor.</p>
    </div>
</div><!-- End Breadcrumbs -->
&nbsp;

<center>
<?php
$mentorID = $_GET['mentorID'];

$sql = "SELECT * FROM mentors where mentorID = $mentorID";

$hs_list = $conn->query($sql);

if ($hs_list->num_rows > 0) {

    while($row = $hs_list->fetch_assoc()) {
 ?>
&nbsp;
   <div class="card mb-3" style="max-width: 700px;">
     <div class="row no-gutters">
      <div class="col-md-4" >
       <img src="<?php echo $row["mentorImg"]; ?>" class="card-img"  style="height:300px"></img>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row["mentorName"]; ?></h5>
			&nbsp;
        <p class="card-text"><?php echo "Phone Number :". $row["mentor_phone_num"]; ?></p>
			&nbsp;
		<p class="card-text"><?php echo "Email :". $row["mentorEmail"]; ?></p>
			&nbsp;
		<p class="card-text"><?php echo "Description : ". $row["mentorEdu"]; ?></p>
    </div>
  </div>
</div>	
<?php
			}
		}

else {
		echo "0 results";
}

?>
 </center>
       &nbsp;
<center>
  <form method="post" action="book_action.php" enctype="multipart/form-data" class="agile_form" name="form1">
        <table border="0" width="50%">
		
			<tr>
            <td><b>Your UserName : </b></td>
            <td><input type="text" name="userName" size="50"></td>
            </tr>
			
            <tr>
            <td><b>Appointment Details : </b></td>
            <td><input type="text" name="appDetail" size="50"></td>
            </tr>
			
			<tr>
            <td><b>Contact Number : </b></td>
            <td><input type="text" name="menteeContact" size="50"></td>
            </tr>

			<tr>
			<td>
            	<div class="form-row">
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
					<input type="date" class="form-control" placeholder="appointment date" name="appDate">
				</div>
			</div><br>
			</td>
            </tr>
			
            <tr>
			<td>
              <div class="form-group">
					<b><p>Appointment Time :</p></b>
					<div class="form-field">		
					<input type="time" class="form-control" placeholder="appointment time" name="appTime">
				</div>
			</div>
			</td>
            </tr>

            <tr>
            <td>&nbsp;</td>
            <td><br>
                <input class="btn btn-outline-success btn-sm" type="submit" name="Submit" value="Book an appointment"></input>&nbsp;
				<input type="hidden" name="mentorID" value=<?php echo $_GET['mentorID'];?>>
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