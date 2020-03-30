<?php
	$username = $_GET['username'];

	
	$servername = "localhost";
	$dbusername = "root";
	$password = "";
	$dbname = "bhc";
	

	// Create connection
	$conn = new mysqli($servername, $dbusername, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	//Resistration
    if ($_SERVER["REQUEST_METHOD"] == "POST")
	 {
	 	$pUserName = $_POST['pUserName'];
        $pPassword = $_POST['currentPassword'];

        $sql = "UPDATE patient SET pPassword='$pPassword' WHERE pUserName='$pUserName'";

		if ($conn->query($sql) === TRUE) {
		    echo "Record Updated successfully";
		} else {
		    //echo "Error: " . $sql . "<br>" . $conn->error;
		    //echo "Invalid Info";
		}
    }

    $conn->close();
    

?>

<html>
	<title>Patient Password Change | BANGABANDHU HEALTH CARE</title>
	<head> 
		<link rel="stylesheet" href="css/patientPasswordChange.css">
		<link rel="shortcut icon" href="images/patienticon3.JPG">
	</head>
	
	<body>
		<!-- Patient Icon -->
		<div>
			<a href="patientPanel.php?username=<?= $username ?>"><img class="ppi" src="images/patienticon3.jpg" alt="Patient Icon"></a>
		</div>
		<!-- Password Change Icon -->
		<div>
			<a href="patientPasswordChange.php?username=<?= $username ?>"><img class="passwordChange" src="images/changepasswordicon.png" alt="Password Change Icon"></a>
		</div>
		<!-- Make Appointment -->
		<div>
			<a href="#"><img class="makeappoitment" src="images/appointmenticon.png" alt="Make Appointment Icon"></a>
		</div>
		<!-- View Icon -->
		<div>
			<a href="patientView.php?username=<?= $username ?>"><img class="viewicon" src="images/viewicon.png" alt="View Icon"></a>
		</div>
		<!-- Search Doctor Icon -->
		<div>
			<a href="doctorDetails.php?username=<?= $username ?>"><img class="searchicon" src="images/searchicon.png" alt="Search Doctor Icon"></a>
		</div>
		
		<div class="register">
			<h2>Password Change</h2><br>
			<form class="form" action="" method="post">
			  <!-- User Name -->
			  <label for="pUserName">User Name:</label>
			  <input class="formBox" type="text" id="pUserName" name="pUserName" placeholder=" Enter User Name"><br><br>

			  <!-- Previous Password -->
			  <label for="previousPassword">Previous Password:</label>
			  <input class="formBox" type="text" id="previousPassword" name="previousPassword" placeholder=" Enter PreviousPassword"><br><br>

			  <!-- Current Password -->
			  <label for="currentPassword">Current Password:</label>
			  <input class="formBox" type="text" id="currentPassword" name="currentPassword" placeholder=" Enter CurrentPassword"><br><br>

			  <!-- Confirm Password -->
			  <label for="confirmPassword">Confirm Password:</label>
			  <input class="formBox" type="text" id="confirmPassword" name="confirmPassword" placeholder=" Enter ConfirmPassword"><br><br>
			
			 <input style="background-color:white;" type="submit" value="Change Password" name="resistration">
			</form>
		</div>
		


		<img class="pi" src="images/patienticon3.jpg">
		
		<!-- Back -->
		<div>
			<a href="patientPanel.php"><img class="back" src="images/backicon.png" alt="Back Icon"></a>
		</div>
	</body>
</html>