<?php 
include "config.php";
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
          <li class="nav-item"><a href="manageUser.php" class="nav-link">All Users</a></li>
		<li class="nav-item"><a href="manageMentor.php" class="nav-link">All Mentors</a></li>
		<li class="nav-item"><a href="manageAppointment.php" class="nav-link">All Appointments</a></li>
		<li class="nav-item"><a href="manageNews.php" class="nav-link">All News</a></li>
		<li class="nav-item"><a href="manageTarget.php" class="nav-link">Target</a></li>
		<li class="nav-item"><a href="manageReport.php" class="nav-link">Reports</a></li>
		<li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
 </header>
 
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>NEWS</h2>
        <p>Add news by filling in the form and manage news. </P>
    </div>
</div><!-- End Breadcrumbs -->
<center>
<br>
<table style = "width:100%">
  <form method="POST" action="addNews_action.php" enctype="multipart/form-data">
        <table border="0" width="50%">
		
            <tr>
            <td>Title </td>
            <td><input type="text" name="newsTitle" size="50"></td>
            </tr>

			<tr>
            <td>Details</td>
            <td><textarea input type="text" name="newsDetail" rows="10" cols="50"></textarea></td>
            </tr>

			
            <tr>
            <td>Extra</td>
            <td><input type="text" name="newsExtra" size="50"></td>
            </tr>


            <tr>
            <td>News Image </td>
            <td><input type="file" name="newsImg" id="newsImg"></td>
            </tr>

            <tr>
            <td>&nbsp;</td>
            <td><br>
                <input class="btn btn-outline-success btn-sm" type="submit" value="Submit"></input>&nbsp;
                <input class="btn btn-outline-dark btn-sm"type="reset" value="Reset">
            </td>
            </tr>
        </table>
		<br>
    </form>
</center>
<div class="card">
				<?php
				$no = 1;
					
					$sql = "SELECT * FROM news";
                    if($result = mysqli_query($conn, $sql)){
					
                        if(mysqli_num_rows($result) > 0){
								  
                                echo "<table id='customers'>";
                                    echo "<tr>";
                                        echo "<th>No</th>";
										echo "<th>Title</th>";
                                        echo "<th>Details</th>";
                                        echo "<th>Extra Info</th>";
										echo "<th>Create Time</th>";
										echo "<th>Action</th>";
                                    echo "</tr>";
                                
                                
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $no++ . "</td>"; 
										echo "<td>" . $row['newsTitle'] . "</td>";
										echo "<td>" . $row['newsDetail'] . "</td>";
										echo "<td>" . $row['newsExtra'] . "</td>";
										echo "<td>" . $row['createTime'] . "</td>";
                                        echo "<td>";
											?><a href="editNews.php?newsID=<?php echo $row['newsID'] ?>">
											<button class="btn btn-outline-primary btn-sm" >Edit</button>
											</a>

											<a href="deleteNews_action.php?newsID=<?php echo $row['newsID'] ?>">
											<button class="btn btn-outline-danger btn-sm" name="delete"> Delete</button>
											</a>
											<?php
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                                           
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    //mysqli_close($link);
					
					
					?>
                    
			</div>
</table>
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