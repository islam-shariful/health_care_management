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
        $pName = $_POST['fullName'];
	    $pUserName = $_POST['userName'];
	    $pAge = $_POST['age'];
	    $pAddress = $_POST['address'];
	    $pPhoneNo = $_POST['phoneNo'];
	    $pBirthday = $_POST['birthday'];
	    $pGender = $_POST['gender'];

        $sql = " UPDATE `patient` SET `pName`='$pName',`pAge`='$pAge',`pAddress`='$pAddress',`pPhoneNo`='$pPhoneNo',`pBirthday`='$pBirthday',`pGender`='$pGender' WHERE `pUserName`='$pUserName' ";

		if ($conn->query($sql) === TRUE) {
		    echo "Record Modified successfully";
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
	<title>Modify Patient | BANGABANDHU HEALTH CARE</title>
	<link rel="stylesheet" href="css/patientManagement.css">
	<link rel="shortcut icon" href="images/adminicon5.JPG">
</head>
<body>
	<!-- ------------------------------------------------------------------------------------- -->
		<!-- Add Patient Icon -->
		<div>
			<a href="patientManagement.php"><img class="api" src="images/adddoctoricon.png" alt="Add Patient Icon"></a>
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

			<h2>MODIFY PATIENT DETAILS</h2><br>
			<form class="form" action="" method="post">
			  <!-- Name -->
			  <label for="fullName">Name:</label>
			  <input class="formBox" type="text" id="fullName" name="fullName" placeholder=" Enter Full Name"><br><br>
			  <!--User Name -->
			  <label for="userName">User Name:</label>
			  <input class="formBox" type="text" id="userName" name="userName" placeholder=" Enter User Name"><br><br>
			  <!-- Age -->
			  <label for="age">Age:</label>
			  <input class="formBox" type="text" id="age" name="age" placeholder=" Enter Age"><br><br>
			  <!-- Address -->
			  <label for="address">Address:</label>
			  <input class="formBox" type="text" id="address" name="address" placeholder=" Enter Address"><br><br>
			  <!-- Phone -->
			  <label for="phoneNo">Phone No:</label>
			  <input class="formBox" type="text" id="phoneNo" name="phoneNo" placeholder=" Enter Phone No."><br><br>
			  <!-- Birthday -->
			  <label for="birthday">Birthday:</label>
 			  <input class="formBox" type="date" id="birthday" name="birthday"><br><br>
 			  <!-- Gender -->
 			  <input type="radio" id="male" name="gender" value="male">
			  <label for="male">Male</label><br>
			  <input type="radio" id="female" name="gender" value="female">
			  <label for="female">Female</label><br>
			  <input type="radio" id="other" name="gender" value="other">
			  <label for="other">Other</label><br><br>
			
			 <input style="background-color:white;" type="submit" value="MODIFY" name="resistration">
			</form>
		</div>

		<!-- Back -->
		<div>
			<a href="adminPanel.php"><img class="back" src="images/backicon.png" alt="Back Icon"></a>
		</div>
</body>
</html>