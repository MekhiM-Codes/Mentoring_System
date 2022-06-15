<?php
include("config.php");

    $userID = $_GET['userID'];

    $sql = "SELECT userName, userEmail, user_phone_num, userPwd FROM users WHERE userID = $userID";

    $result = $conn->query($sql);	

    if (mysqli_num_rows($result) > 0) {
                        
        while($row = mysqli_fetch_assoc($result)) { 

            $userName = $row['userName'];
            $userEmail = $row['userEmail'];
			$user_phone_num = $row['user_phone_num'];
            $userPwd= $row['userPwd'];
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
          <li><a class="active" href="manageUser.php">Back</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
 </header>

  <!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>EDIT USER DETAILS</h2>
        <p>Change the information of user here.</p>
    </div>
</div><!-- End Breadcrumbs -->
&nbsp;

<center>
    <form method="POST" action="editUser_action.php" enctype="multipart/form-data">
        <table border="0" width="50%">
            <tr>
            <td>Name</td>
            <td><input type="text" name="userName" size="50" value="<?php echo $userName?>" required></td>
            </tr>

            <tr>
            <td>Email</td>
            <td><input type="text" name="userEmail" size="50" value="<?php echo $userEmail?>" required></td>
            </tr>
			
			<tr>
            <td>Phone Number</td>
            <td><input type="text" name="user_phone_num" size="50" value="<?php echo $user_phone_num?>" required></td>
            </tr>

            <tr>
            <td>Password </td>
            <td><input type="text" name="userPwd" size="50" value="<?php echo $userPwd?>" required></td>
            </tr>

            <tr>
            <td>&nbsp;</td>&nbsp;
            <td>
				</br>
                <input type="hidden" name="userID" value="<?php echo $userID; ?>">
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