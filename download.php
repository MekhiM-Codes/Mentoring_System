<?php 

include "config.php";

if (isset($_GET['reportID'])) {
    $id = mysqli_real_escape_string($conn,$_GET['reportID']);

    // fetch file to download from database
    $sql = "SELECT * FROM  reports WHERE reportID=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../uploads/' . $file['fileName'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../uploads/' . $file['fileName']));
        readfile('../uploads/' . $file['fileName']);
		  exit;
    }

}


?>