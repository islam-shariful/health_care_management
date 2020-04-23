<?php
	// Start the session
	session_start();

	

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

            // Set session variables
			$_SESSION["adminName"] = $_POST['username'];
        }

        $sql = "SELECT * FROM adminlogin WHERE aUserName='$username' AND aPassword='$password'";

        
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            header('Location:adminPanel.php');
        } else {
            header('Location:adminLogin.php');
        }
    } 
    $conn->close();
    

?>

<html>
	<head>
		<title>AdminLogin | BANGABANDHU HEALTH CARE</title>
		<link rel="stylesheet" href="css/adminLogin.css">
		<link rel="shortcut icon" href="images/adminicon5.JPG">
	</head>
	
	<body>		
	    <div class="center-login">
	    	<h2>WELCOME TO ADMIN LOGIN</h2>
			<form class="form"action="" method="post">
			  <label for="username">UserName:</label><br>
			  <input type="text" id="username" name="username" placeholder="Enter UserName"><br>
			  
			  <label for="password">Password:</label><br>
			  <input type="text" id="password" name="password" placeholder="Enter Password" >
			
			 <input style="background-color: white;" type="submit" value="Login" name="submit">
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
