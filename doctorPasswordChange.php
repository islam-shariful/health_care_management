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
	 	$dUserName = $_POST['dUserName'];
        $dPassword = $_POST['currentPassword'];

        $sql = "UPDATE doctor SET dPassword='$dPassword' WHERE dUserName='$dUserName'";

		if ($conn->query($sql) === TRUE) {
		    echo "Record Updated successfully";
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
	<title>DoctorPasswordChange | BANGABANDHU HEALTH CARE</title>
	<link rel="stylesheet" href="css/doctorPasswordChange.css">
	<link rel="shortcut icon" href="images/doctoricon4.JPG">
</head>
<body>
	<div class="register">
			<h2>Password Change</h2><br>
			<form class="form" action="" method="post">
			  <!-- User Name -->
			  <label for="dUserName">User Name:</label>
			  <input class="formBox" type="text" id="dUserName" name="dUserName" placeholder=" Enter User Name"><br><br>

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
		

	<img class="di" src="images/doctoricon4.jpg">
	
	<div>
			<a href="doctorPanel.php"><img class="backicon" src="images/backicon.png" alt="Back Icon"></a>
	</div>
</body>
</html>