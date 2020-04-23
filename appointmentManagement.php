<?php
	session_start();
	if(!isset($_SESSION['adminName']))
	{
		header("Location:adminLogin.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Appointment Management | BANGABANDHU HEALTH CARE</title>
	<link rel="stylesheet" href="css/appointmentManagement.css">
	<link rel="shortcut icon" href="images/adminicon5.JPG">
</head>
<body>
	<h1>Appointment Management Page</h1>

	<!-- Back -->
	<div>
		<a href="adminPanel.php"><img class="back" src="images/backicon.png" alt="Back Icon"></a>
	</div>
</body>
</html>