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
    $sql = " SELECT * FROM `doctor` WHERE 1 ";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "Name: " . $row["dName"]. "<br>". "UserName: " . $row["dUserName"]. "<br>"."Age: " . $row["dAge"]. "<br>"."Speciality: " . $row["dSpeciality"]. "<br>"."Address: " . $row["dAddress"]. "<br>"."Phone No: " . $row["dPhoneNo"]. "<br>"."Birthday: " . $row["dBirthday"]."<br>"."Gender: " . $row["dGender"]. "<br>". "<br>";
		    }
		} else {
		    echo "Invalid";
		}

    $conn->close();
    

?>

<!DOCTYPE html>
<html>
<head>
	<title>View Doctor(Admin) | BANGABANDHU HEALTH CARE</title>
	<link rel="stylesheet" href="css/doctorview.css">
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

		

		<!-- Back -->
		<div>
			<a href="adminPanel.php"><img class="back" src="images/backicon.png" alt="Back Icon"></a>
		</div>
</body>
</html>