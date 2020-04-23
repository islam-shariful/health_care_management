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
        $eName = $_POST['fullName'];
	    $eAge = $_POST['age'];
	    $eCategory = $_POST['category'];
	    $eAddress = $_POST['address'];
	    $ePhoneNo = $_POST['phoneNo'];
	    $eBirthday = $_POST['birthday'];
	    $eGender = $_POST['gender'];

        $sql = "INSERT INTO `employee`(`eName`, `eAge`, `eCategory`, `eAddress`, `ePhoneNo`, `eBirthday`, `eGender`) VALUES ('$eName','$eAge','$eCategory','$eAddress','$ePhoneNo','$eBirthday','$eGender');";

		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
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
	<title>Employee Management | BANGABANDHU HEALTH CARE</title>
	<link rel="stylesheet" href="css/employeeManagement.css">
	<link rel="shortcut icon" href="images/adminicon5.JPG">
</head>
<body>
	<!-- ------------------------------------------------------------------------------------- -->
		<!-- Add Employee Icon -->
		<div>
			<a href="employeeManagement.php"><img class="aei" src="images/adddoctoricon.png" alt="Add Employee Icon"></a>
		</div>
		<!-- Delete Employee Icon -->
		<div>
			<a href="employeeDelete.php"><img class="dei" src="images/deletedoctoricon.png" alt="Delete Employee Icon"></a>
		</div>
		<!-- Update Employee Icon -->
		<div>
			<a href="employeeModify.php"><img class="uei" src="images/updatedoctoricon.png" alt="Update Employee Icon"></a>
		</div>
		<!-- View Employee Icon -->
		<div>
			<a href="employeeView.php"><img class="vei" src="images/viewicon.png" alt="View Employee Icon"></a>
		</div>
		<!-- Search Employee Icon -->
		<div>
			<a href="employeeFind.php"><img class="sei" src="images/searchicon.png" alt="Search Employee Icon"></a>
		</div>
		<!-- ---------------------------------------------------------------------------- -->

		<div class="register">
			<h2>REGISTER EMPLOYEE</h2><br>
			<form class="form" action="" method="post">
			  <!-- Name -->
			  <label for="fullName">Name:</label>
			  <input class="formBox" type="text" id="fullName" name="fullName" placeholder=" Enter Full Name"><br><br>
			  <!-- Age -->
			  <label for="age">Age:</label>
			  <input class="formBox" type="text" id="age" name="age" placeholder=" Enter Age"><br><br>
			  <!-- Category -->
			  <label for="category">Category:</label>
			  <input class="formBox" type="text" id="category" name="category" placeholder=" Enter Category"><br><br>
			  <!-- Address -->
			  <label for="address">Address:</label>
			  <input class="formBox" type="text" id="address" name="address" placeholder=" Enter Address"><br><br>
			  <!-- Phone -->
			  <label for="phoneNo">Phone No:</label>
			  <input class="formBox" type="text" id="phoneNo" name="phoneNo" placeholder=" Enter Unique Phone No."><br><br>
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
			
			 <input style="background-color:white;" type="submit" value="RESISTRATION" name="resistration">
			</form>
	</div>

	<!-- Back -->
	<div>
		<a href="adminPanel.php"><img class="back" src="images/backicon.png" alt="Back Icon"></a>
	</div>
</body>
</html>