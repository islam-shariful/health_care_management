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
	    $ePhoneNo = $_POST['phoneNo'];

        $sql = " SELECT `eName`, `eAge`, `eCategory`, `eAddress`, `ePhoneNo`, `eBirthday`, `eGender` FROM `employee` WHERE ePhoneNo = '$ePhoneNo' ;";
        $result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "Name: " . $row["eName"]. "<br>"."Age: " . $row["eAge"]."<br>"."Category: " . $row["eCategory"]. "<br>"."Address: " . $row["eAddress"]. "<br>"."Phone No: " . $row["ePhoneNo"]. "<br>"."Birthday: " . $row["eBirthday"]. "<br>"."Gender: " . $row["eGender"]. "<br>". "<br>";
		    }
		} else {
			//echo "Error: " . $sql . "<br>" . $conn->error;
		    echo "Invalid User Identity";
		}
    }

    $conn->close();
    

?>

<!DOCTYPE html>
<html>
<head>
	<title>Employee Find | BANGABANDHU HEALTH CARE</title>
	<link rel="stylesheet" href="css/employeeFind.css">
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
			<h2>SEARCH EMPLOYEE DETAILS</h2><br>
			<form class="form" action="" method="post">
			  <!-- Phone -->
			  <label for="phoneNo">Phone No:</label>
			  <input class="formBox" type="text" id="phoneNo" name="phoneNo" placeholder=" Enter Unique Phone No."><br><br>
			
			 <input style="background-color:white;" type="submit" value="SEARCH" name="resistration">
			</form>
	</div>

	<!-- Back -->
	<div>
		<a href="adminPanel.php"><img class="back" src="images/backicon.png" alt="Back Icon"></a>
	</div>
</body>
</html>