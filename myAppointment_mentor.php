<?php
session_start();
include("config.php");

$no = 1;
$id = $_SESSION["UID"];
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
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 5px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 10px;
  padding-bottom: 10px;
  text-align: left;
  background-color: dimgrey;
  color: white;
}

</style>
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
        <h2>MY APPOINTMENTS</h2>
        <p>Below is the list of all your appointments with your mentee.</p>
    </div>
</div><!-- End Breadcrumbs -->
&nbsp;
<body>

<table style = "width:100%">
<div class="card">
				<?php
				$no = 1;
					
			 $sql = "SELECT mentors.mentorName, users.userName, appointment.appDetail, appointment.menteeContact, appointment.appDate, appointment.appTime, appointment.appChoice, appointment.appStatus, appointment.appID
					FROM mentors
					INNER JOIN appointment
					ON mentors.mentorID = appointment.mentorID
					INNER JOIN users
					ON appointment.userID = users.userID";;
					
                    if($result = mysqli_query($conn, $sql)){
					
                        if(mysqli_num_rows($result) > 0){
								  
                                echo "<table id='customers'>";
                                    echo "<tr>";
                                        echo "<th>No</th>";
										echo "<th>Mentor</th>";
										echo "<th>Mentee</th>";
                                        echo "<th>Detail</th>";
										echo "<th>Mentee's Contact</th>";
										echo "<th>Date</th>";
										echo "<th>Time</th>";
										echo "<th>Type</th>";
										echo "<th>Status</th>";
										echo "<th>Action</th>";
                                    echo "</tr>";
                                
                                
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $no++ . "</td>"; 
										echo "<td>" . $row['mentorName'] . "</td>";
										echo "<td>" . $row['userName'] . "</td>";
										echo "<td>" . $row['appDetail'] . "</td>";
										echo "<td>" . $row['menteeContact'] . "</td>";
										echo "<td>" . $row['appDate'] . "</td>";
										echo "<td>" . $row['appTime'] . "</td>";
										echo "<td>" . $row['appChoice'] . "</td>";
										echo "<td>" . $row['appStatus'] . "</td>";
                                        echo "<td>";
											?>
											<a href="approveapp.php?appID=<?php echo $row['appID'] ?>">
											<button class="btn btn-outline-primary btn-sm" >Approve</button>
											</a>
											<a href="rejectapp.php?appID=<?php echo $row['appID'] ?>">
											<button class="btn btn-outline-danger btn-sm"> Reject</button>
											</a>
											<?php
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                                           
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>You do not have any appointment at the moment.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    //mysqli_close($link);
					
					
					?>
                    
			</div>



</table>
</body>
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