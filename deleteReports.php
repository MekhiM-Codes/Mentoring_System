<?php
session_start();
include("config.php");

if(isset($_GET['reportID']))
{
    $reportId = $_GET['reportID'];

    $sql = "DELETE FROM reports WHERE reportID = $reportId";

    $deletedReport = $conn->query($sql);

		$message = "Reports deleted successfully!";
                
    if($deletedReport) 
    { ?>
        
        <html>
            <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
            <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
			<?php echo "<script type='text/javascript'>alert('$message');</script>"; 
			header( "refresh:1;url=manageReport.php" );?>
       </div>
       <html>

    <?php
}

else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
}

?>