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

	



	//if ($_SERVER["REQUEST_METHOD"] == "POST")
	//{
		//$pUserName = $_POST['pUserName'];
		$pUserName = $_GET['username'];
		//echo "$pUserName </br>";

		$sql = "SELECT `pName`, `pUserName`, `pPassword`, `pAge`, `pAddress`, `pPhoneNo`, `pBirthday`, `pGender` FROM `patient` WHERE `pUserName`='$pUserName' ";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "<strong>"."Personal Information : "."</strong>"."<br>"."<strong>"."Name: " ."</strong>" .$row["pName"]. "<br>"."<strong>"."Address: " ."</strong>". $row["pAddress"]."<br>"."<strong>"."Phone No: " ."</strong>". $row["pPhoneNo"]. "<br>"."<strong>"."Birthday: " ."</strong>". $row["pBirthday"]."<br>"."<strong>"."Gender: " ."</strong>". $row["pGender"]. "<br>". "<br>";
		    }
		} else {
		    echo "Invalid UserName";
		}
	//}


	$conn->close();
?>

<html>
	<title>Patient View | BANGABANDHU HEALTH CARE</title>
	<head> 
		<style>
		table, th, td {
		    border: 2px solid White;
		}
	</style>
		<link rel="stylesheet" href="css/patientView.css">
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

		<!-- >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> -->
		<div class="register">
			<h2>Patient Info</h2><br>
			<form class="form" action="" method="post">
			  <!-- User Name -->
			  <label for="pUserName">User Name:</label>
			  <input class="formBox" type="text" id="pUserName" name="pUserName" placeholder=" Enter User Name"><br><br>
			
			 <input style="background-color:white;" type="submit" value="View Info" name="resistration">
			</form>
		</div>
		<!-- >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> 


		<img class="pi" src="images/patienticon3.jpg">
		-->
		<div>
			<a href="patientPanel.php?username=<?= $username ?>"><img class="back" src="images/backicon.png" alt="Back Icon"></a>
		</div>
	</body>
</html>

