<?php
	
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

	/*
					// Create connection
					$conn = new mysqli($servername, $dbusername, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
					    die("Connection failed: " . $conn->connect_error);
					}

					$sql = "Select * from admit";
					$result = query($sql);

	*/


	//Resistration
    if ($_SERVER["REQUEST_METHOD"] == "POST")
	 {
	    $pUserName = $_POST['userName'];
	    $admitID = $_POST['admitID'];
	    $catagory = $_POST['catagory'];
	    $room = $_POST['room'];
	    $date = $_POST['date'];

		$sql2 = "SELECT SUM(room) AS sumRoom FROM admit WHERE catagory = '$catagory' ";
		$res = mysqli_query($conn, $sql2);
		$data = mysqli_fetch_array($res);
		$sumRoom = $data['sumRoom'];
		//echo $sumRoom;

        $sql = "INSERT INTO `admit`(`pUserName`,`admitID`, `catagory`, `room`, `date`) VALUES ('$pUserName','$admitID','$catagory','$room','$date');" ;
        if($sumRoom<"8") {

			if ($conn->query($sql) === TRUE) {
				$sql3 = "  INSERT INTO `bill`(`admitID`, `billAmount`) VALUES ('$admitID','0.0'); ";
				$res2 = mysqli_query($conn, $sql3);
			    echo "Patient Admitted successfully";
			}else {
			    //echo "Error: " . $sql . "<br>" . $conn->error;
			    echo "Invalid Info";
			}
		}
		else {echo "Room Full";}
    }

    $conn->close();
    

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admit Patient | BANGABANDHU HEALTH CARE</title>
	<link rel="stylesheet" href="css/patientManagement.css">
	<link rel="shortcut icon" href="images/adminicon5.JPG">
</head>
<body>
	<!-- ------------------------------------------------------------------------------------- -->
		<!-- Add Patient Icon -->
		<div>
			<a href="patientManagement.php"><img class="api" src="images/adddoctoricon.png" alt="Add Patient Icon"></a>
		</div>
		<!-- Admit Patient Icon -->
		<div>
			<a href="admitPatient.php"><img class="admitPatientIcon" src="images/admiticon.jpg" alt="Add Patient Icon"></a>
		</div>
		<!-- Delete Patient Icon -->
		<div>
			<a href="patientDelete.php"><img class="dpi" src="images/deletedoctoricon.png" alt="Delete Patient Icon"></a>
		</div>
		<!-- Update Patient Icon -->
		<div>
			<a href="patientModify.php"><img class="upi" src="images/updatedoctoricon.png" alt="Update Patient Icon"></a>
		</div>
		<!-- View Patient Icon -->
		<div>
			<a href="patientViewA.php"><img class="vpi" src="images/viewicon.png" alt="View Patient Icon"></a>
		</div>
		<!-- Search Patient Icon -->
		<div>
			<a href="patientFind.php"><img class="spi" src="images/searchicon.png" alt="Search Patient Icon"></a>
		</div>
		<!-- ---------------------------------------------------------------------------- -->
	<div class="register">

			<h2>ADMIT PATIENT</h2><br>
			<form class="form" action="" method="post">
			  <!-- User Id -->
			  <label for="userName">User ID:</label>
			  <input class="formBox" type="text" id="userName" name="userName" placeholder=" Enter User ID"><br><br>
			  <!-- Admit Id -->
			  <label for="admitID">Admit ID:</label>
			  <input class="formBox" type="text" id="admitID" name="admitID" placeholder=" Enter Admit ID"><br><br>

			  <!-- User Id --><!--
			  <label for="pUserName">Select User :</label>
			  <select name="pUserName">
			  	-->




			  <label for="catagory">Catagory :</label>
			  <div>
				  <input type="radio" id="premier1" name="catagory" value="premier1">
				  <label for="premier1">Premier-Single Bed</label><br>
				  <input type="radio" id="premier2" name="catagory" value="premier2">
				  <label for="premier2">Premier-Double Bed</label><br>

				  <input type="radio" id="general1" name="catagory" value="general1">
				  <label for="general1">General-Single Bed</label><br>
				  <input type="radio" id="general2" name="catagory" value="general2">
				  <label for="general2">General-Double Bed</label><br><br>
			  </div>

			  <div>
			  	<label for="room">Choose Amount of Rooms:</label>
				<select name="room">
				  <option value="1">1</option>
				  <option value="2">2</option>
				  <option value="3">3</option>
				  <option value="4">4</option>
				</select><br><br>
			  </div>
			  <!-- Admitted Date -->
			  <label for="date">Date:</label>
 			  <input class="formBox" type="date" id="date" name="date"><br><br>
			
			 <input style="background-color:white;" type="submit" value="ADMIT" name="resistration">
			</form>
		</div>

		<!-- Back -->
		<div>
			<a href="adminPanel.php"><img class="back" src="images/backicon.png" alt="Back Icon"></a>
		</div>
</body>
</html>