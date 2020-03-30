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
	    $pUserName = $_POST['userName'];

        $sql = " SELECT * FROM `patient` WHERE pUserName = '$pUserName' ;";
        $result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "Name: " . $row["pName"]. "<br>"."User Name: " . $row["pUserName"]. "<br>"."Age: " . $row["pAge"]. "<br>"."Address: " . $row["pAddress"]. "<br>"."Phone No: " . $row["pPhoneNo"]. "<br>"."Birthday: " . $row["pBirthday"]. "<br>"."Gender: " . $row["pGender"]. "<br>". "<br>";
		    }
		} else {
			//echo "Error: " . $sql . "<br>" . $conn->error;
		    echo "Invalid User Name";
		}
    }

    $conn->close();
    

?>

<!DOCTYPE html>
<html>
<head>
	<title>Find Patient | BANGABANDHU HEALTH CARE</title>
	<link rel="stylesheet" href="css/patientFind.css">
	<link rel="shortcut icon" href="images/adminicon5.JPG">
</head>
<body>
	<!-- ------------------------------------------------------------------------------------- -->
		<!-- Add Patient Icon -->
		<div>
			<a href="patientManagement.php"><img class="api" src="images/adddoctoricon.png" alt="Add Patient Icon"></a>
		</div>
		<!-- Delete patient Icon -->
		<div>
			<a href="patientDelete.php"><img class="dpi" src="images/deletedoctoricon.png" alt="Delete patient Icon"></a>
		</div>
		<!-- Update patient Icon -->
		<div>
			<a href="patientModify.php"><img class="upi" src="images/updatedoctoricon.png" alt="Update patient Icon"></a>
		</div>
		<!-- View patient Icon -->
		<div>
			<a href="patientViewA.php"><img class="vpi" src="images/viewicon.png" alt="View patient Icon"></a>
		</div>
		<!-- Search patient Icon -->
		<div>
			<a href="patientFind.php"><img class="spi" src="images/searchicon.png" alt="Search patient Icon"></a>
		</div>
		<!-- ---------------------------------------------------------------------------- -->
		<div class="register">

			<h2>SEARCH PATIENT</h2><br>
			<form class="form" action="" method="post">
			  <!--User Name -->
			  <label for="userName">User Name:</label>
			  <input class="formBox" type="text" id="userName" name="userName" placeholder=" Enter User Name"><br><br>
			
			 <input style="background-color:white;" type="submit" value="SEARCH" name="resistration">
			</form>
		</div>

		<!-- Back -->
		<div>
			<a href="adminPanel.php"><img class="back" src="images/backicon.png" alt="Back Icon"></a>
		</div>
</body>
</html>