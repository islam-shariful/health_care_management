<?php
	session_start();
	if(!isset($_SESSION['adminName']))
	{
		header("Location:adminLogin.php");
	}
	
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
        $dName = $_POST['fullName'];
	    $dUserName = $_POST['userName'];
	    $dAge = $_POST['age'];
	    $dSpeciality = $_POST['speciality'];
	    $dAddress = $_POST['address'];
	    $dPhoneNo = $_POST['phoneNo'];
	    $dBirthday = $_POST['birthday'];
	    $dGender = $_POST['gender'];

        //$sql = "INSERT INTO `doctor`(`dName`, `dUserName`, `dAge`, `dSpeciality`, `dAddress`, `dPhoneNo`, `dBirthday`, `dGender`) VALUES ('$dName','$dUserName','$dAge','$dSpeciality','$dAddress','$dPhoneNo','$dBirthday','$dGender');";
       //$sql = " UPDATE `doctor` SET 'dName' = '$dName', 'dAge' = `$dAge`, 'dSpeciality' = `$dSpeciality`, 'dAddress' = `$dAddress`, 'dPhoneNo' = `$dPhoneNo`, 'dBirthday' = `$dBirthday`, 'dGender' = `$dGender` WHERE 'dUserName' = '$dUserName' ; ";
        $sql = " UPDATE `doctor` SET `dName`='$dName',`dAge`='$dAge',`dSpeciality`='$dSpeciality',`dAddress`='$dAddress',`dPhoneNo`='$dPhoneNo',`dBirthday`='$dBirthday',`dGender`='$dGender' WHERE `dUserName`='$dUserName' ";

		if ($conn->query($sql) === TRUE) {
		    echo "Record Modified successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		    //echo "Invalid Info";
		}
    }

    $conn->close();
    

?>

<!DOCTYPE html>
<html>
<head>
	<title>Modify Doctor | BANGABANDHU HEALTH CARE</title>
	<link rel="stylesheet" href="css/doctormodify.css">
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
			<h2>MODIFY DOCTOR DETAILS</h2><br>
			<!-- Form -->
			<form class="form" action="" method="post">
			  <!-- Name -->
			  <label for="fullName">Name:</label>
			  <input class="formBox" type="text" id="fullName" name="fullName" placeholder=" Enter Full Name"><br><br>
			  <!-- User Name -->
			  <label for="userName">User Name:</label>
			  <input class="formBox" type="text" id="userName" name="userName" placeholder=" Enter User Name"><br><br>
			  <!-- Age -->
			  <label for="age">Age:</label>
			  <input class="formBox" type="text" id="age" name="age" placeholder=" Enter Age"><br><br>
			  <!-- Speciality -->
			  <label for="speciality">Speciality:</label>
			  <input class="formBox" type="text" id="speciality" name="speciality" placeholder=" Enter Expertness"><br><br>
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