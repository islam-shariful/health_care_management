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

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
        }

        $sql = "SELECT * FROM patient WHERE pUserName='$username' AND pPassword='$password'";

        
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            header("Location:patientPanel.php"."?username=$username");
            //set cookie
            setcookie("loggedInUser",$username,time()+300);
        } else {
            header('Location:patientLogin.php');
        }
    } 
    $conn->close();
    

?>

<html>
	<head>
		<title>PatientLogin | BANGABANDHU HEALTH CARE</title>
		<link rel="stylesheet" href="css/patientLogin.css">
		<link rel="shortcut icon" href="images/patienticon3.JPG">
	</head>
	
	<body>
		<div class="center-login">
			<h2>WELCOME TO PATIENT LOGIN</h2>
			<form class="form" action="" method="post">
			  <label for="username">UserName:</label><br>
			  <input type="text" id="username" name="username" placeholder="Enter UserName"><br>
			  
			  <label for="password">Password:</label><br>
			  <input type="text" id="password" name="password" placeholder="Enter Password" >
			
			 <input type="submit" value="Login" name="submit">
			 <a style="color: black;background-color: lightgray;" href="patientSignUp.php">Sign Up</a>
			</form>
		</div>

		<!-- Back -->
		<div>
			<a href="login.html"><img class="back" src="images/backicon.png" alt="Back Icon"></a>
		</div>
		
		<!-- Home -->
		<div>
			<a href="index.html"><img class="home" src="images/homeicon.png" alt="Home Icon"></a>
		</div>
	</body>
</html>