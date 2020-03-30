<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bhc";
	

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	//Resistration
    if ($_SERVER["REQUEST_METHOD"] == "POST")
	 {
	    $dUserName = $_POST['userName'];

        $sql = " DELETE FROM `doctor` WHERE dUserName='$dUserName' ;";

		if ($conn->query($sql) === TRUE) {
		    echo "Record deleted successfully";
		} else {
		    //echo "Error: " . $sql . "<br>" . $conn->error;
		    //echo "Invalid Info";
		}
    }

    $conn->close();
    

?>

<!DOCTYPE html>
<html>
<head>
	<title>Remove Doctor | BANGABANDHU HEALTH CARE</title>
	<link rel="stylesheet" href="css/doctordelete.css">
	<link rel="shortcut icon" href="images/adminicon5.JPG">
</head>
<body>
	<!-- ------------------------------------------------------------------------------------- -->
		<!-- Add Doctor Icon -->
		<div>
			<a href="doctorManagement.php"><img class="adi" src="images/adddoctoricon.png" alt="Patient Icon"></a>
		</div>
		<!-- Delete Doctor Icon -->
		<div>
			<a href="doctordelete.php"><img class="ddi" src="images/deletedoctoricon.png" alt="Password Change Icon"></a>
		</div>
		<!-- Update Doctor Icon -->
		<div>
			<a href="doctormodify.php"><img class="udi" src="images/updatedoctoricon.png" alt="Make Appointment Icon"></a>
		</div>
		<!-- View Doctor Icon -->
		<div>
			<a href="doctorview.php"><img class="vdi" src="images/viewicon.png" alt="View Icon"></a>
		</div>
		<!-- Search Doctor Icon -->
		<div>
			<a href="doctorfind.php"><img class="sdi" src="images/searchicon.png" alt="Search Doctor Icon"></a>
		</div>
		<!-- ---------------------------------------------------------------------------- -->

		<div class="register">
			<!-- Greeting -->
			<h2>REMOVE DOCTOR</h2><br>
			<!-- Form -->
			<form class="form" action="" method="post">
			  <!-- User Name -->
			  <label for="userName">User Name:</label>
			  <input class="formBox" type="text" id="userName" name="userName" placeholder=" Enter User Name"><br><br>
			
			 <input style="background-color:white;" type="submit" value="DELETE" name="resistration">
			</form>
		</div>

		<!-- Back -->
		<div>
			<a href="adminPanel.php"><img class="back" src="images/backicon.png" alt="Back Icon"></a>
		</div>
</body>
</html>