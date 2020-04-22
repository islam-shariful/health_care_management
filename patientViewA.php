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
    $sql = " SELECT * FROM `admit` WHERE 1 ";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "<strong>"."User Name : " ."</strong>". $row["pUserName"]. "<br>"."<strong>"."Catagory : " ."</strong>". $row["catagory"]. "<br>"."<strong>"."Rooms : " ."</strong>". $row["room"]. "<br>"."<strong>"."Admitted Date : " ."</strong>". $row["date"]."<br>"."<br>";
		    }
		} else {}

    $conn->close();
    

?>

<!DOCTYPE html>
<html>
<head>
	<title>View Patient (Admin) | BANGABANDHU HEALTH CARE</title>
	<link rel="stylesheet" href="css/patientViewA.css">
	<link rel="shortcut icon" href="images/adminicon5.JPG">
</head>
<body>
	<!-- ------------------------------------------------------------------------------------- -->
		<!-- Add Patient Icon -->
		<div class="iconToHover">
			<a href="patientManagement.php"><img class="api" src="images/adddoctoricon.png" alt="Add Patient Icon"></a>
			<span class="hoverText">REGISTER PATIENT</span>
		</div>
		<!-- Admit Patient Icon -->
		<div class="iconToHover">
			<a href="admitPatient.php"><img class="admitPatientIcon" src="images/admiticon.jpg" alt="Add Patient Icon"></a>
			<span class="hoverText">ADMIT PATIENT</span>
		</div>
		<!-- Delete Patient Icon -->
		<div class="iconToHover">
			<a href="patientDelete.php"><img class="dpi" src="images/deletedoctoricon.png" alt="Delete Patient Icon"></a>
			<span class="hoverText">RELEASE PATIENT</span>
		</div>
		<!-- Update Patient Icon -->
		<div class="iconToHover">
			<a href="patientModify.php"><img class="upi" src="images/updatedoctoricon.png" alt="Update Patient Icon"></a>
			<span class="hoverText">MODIFY PATIENT</span>
		</div>
		<!-- View Patient Icon -->
		<div class="iconToHover">
			<a href="patientViewA.php"><img class="vpi" src="images/viewicon.png" alt="View Patient Icon"></a>
			<span class="hoverText">VIEW PATIENT</span>
		</div>
		<!-- Search Patient Icon -->
		<div class="iconToHover">
			<a href="patientFind.php"><img class="spi" src="images/searchicon.png" alt="Search Patient Icon"></a>
			<span class="hoverText">SEARCH PATIENT</span>
		</div>
		<!-- ---------------------------------------------------------------------------- -->

		

		<!-- Back -->
		<div>
			<a href="adminPanel.php"><img class="back" src="images/backicon.png" alt="Back Icon"></a>
		</div>
</body>
</html>