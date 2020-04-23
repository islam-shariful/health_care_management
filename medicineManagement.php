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
        $medicineName = $_POST['medicineName'];
	    $price = $_POST['price'];
	    $serialNo = $_POST['serialNo'];

        $sql = "INSERT INTO `medicine`(`medicineName`, `price`, `serialNo`) VALUES ('$medicineName','$price','$serialNo');";

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
	<title>Medicine Management | BANGABANDHU HEALTH CARE</title>
	<link rel="stylesheet" href="css/medicineManagement.css">
	<link rel="shortcut icon" href="images/adminicon5.JPG">
</head>
<body>
	<div class="register">
			<h2>WELCOME TO Medicine RESISTRATION</h2><br>
			<form class="form" action="" method="post">
			  <!-- Medicine Name -->
			  <label for="medicineName">Medicine Name:</label>
			  <input class="formBox" type="text" id="medicineName" name="medicineName" placeholder=" Enter Medicine Name"><br><br>
			  <!-- Price -->
			  <label for="price">Price:</label>
			  <input class="formBox" type="text" id="price" name="price" placeholder=" Enter Price"><br><br>
			  <!-- Serial No. -->
			  <label for="serialNo">Serial No.:</label>
			  <input class="formBox" type="text" id="serialNo" name="serialNo" placeholder=" Enter Serial No."><br><br>
			
			 <input style="background-color:white;" type="submit" value="RESISTER" name="resistration">
			</form>
		</div>


		<!-- Back -->
		<div>
			<a href="adminPanel.php"><img class="back" src="images/backicon.png" alt="Back Icon"></a>
		</div>
</body>
</html>