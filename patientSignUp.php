<?php
	
	$servername = "localhost";
	$username = "root";
	$dbpassword = "";
	$dbname = "bhc";
	

	// Create connection
	$conn = new mysqli($servername, $username, $dbpassword, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	//Resistration
    if ($_SERVER["REQUEST_METHOD"] == "POST")
	 {
        $pName = $_POST['fullName'];
	    $pUserName = $_POST['userName'];
        $pPassword = $_POST['password'];
	    $pAge = $_POST['age'];
	    $pAddress = $_POST['address'];
	    $pPhoneNo = $_POST['phoneNo'];
	    $pBirthday = $_POST['birthday'];
	    $pGender = $_POST['gender'];

        $sql = "INSERT INTO `patient`(`pName`, `pUserName`, `pAge`, `pAddress`, `pPhoneNo`, `pBirthday`, `pGender`) VALUES ('$pName','$pUserName','$pAge','$pAddress','$pPhoneNo','$pBirthday','$pGender');";
        
        $sql2 = "UPDATE patient SET pPassword='$pPassword' WHERE pUserName='$pUserName'";
		if ($conn->query($sql) === TRUE) {
			$result = $conn->query($sql2);
		    echo "Sign Up successful";
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
	<title>Patient Management | BANGABANDHU HEALTH CARE</title>
	<link rel="stylesheet" href="css/patientSignUp.css">
	<link rel="shortcut icon" href="images/adminicon5.JPG">
</head>
<body>
	<div class="register">

			<h2>REGISTER PATIENT</h2><br>
			<form class="form" action="" method="post">
			  <!-- Name -->
			  <label for="fullName">Name:</label>
			  <input class="formBox" type="text" id="fullName" name="fullName" placeholder=" Enter Full Name"><br><br>
			  <!--User Name -->
			  <label for="userName">User Name:</label>
			  <input class="formBox" type="text" id="userName" name="userName" placeholder=" Enter User Name"><br><br>
			  <!-- Password -->
			  <label for="password">Password:</label>
			  <input class="formBox" type="text" id="password" name="password" placeholder=" Enter Password"><br><br>
			  <!-- Age -->
			  <label for="age">Age:</label>
			  <input class="formBox" type="text" id="age" name="age" placeholder=" Enter Age"><br><br>
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
			
			 <input style="background-color:white;" type="submit" value="Sign Up" name="resistration">
			</form>
		</div>

		<!-- Back -->
		<div>
			<a href="patientLogin.php"><img class="back" src="images/backicon.png" alt="Back Icon"></a>
		</div>
</body>
</html>