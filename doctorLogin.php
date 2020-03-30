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

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
        }

        $sql = "SELECT * FROM doctor WHERE dUserName='$username' AND dPassword='$password'";

        
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            header('Location:doctorPanel.php');
        } else {
            header('Location:doctorLogin.php');
        }
    } 
    $conn->close();
    

?>

<html>
	<head>
		<title>DoctorLogin | BANGABANDHU HEALTH CARE</title>

		<link rel="stylesheet" href="css/doctorLogin.css">
		<link rel="shortcut icon" href="images/doctoricon4.JPG">
		

	</head>
	
	<body>
		<div class="center-login">
			<h2>WELCOME TO DOCTOR LOGIN</h2>
			<form class="form" action="" method="post">
			  <label for="username">UserName:</label><br>
			  <input type="text" id="username" name="username" placeholder="Enter UserName"><br>
			  
			  <label for="password">Password:</label><br>
			  <input type="text" id="password" name="password" placeholder="Enter Password" >
			
			 <input type="submit" value="Login" name="submit">
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