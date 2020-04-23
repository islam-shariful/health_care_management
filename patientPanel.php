<?php
	//echo $_GET['username'];
	$username = $_GET['username'];

	//session_start();
	if(!isset($_COOKIE['loggedInUser']))
	{
		header("Location:patientLogin.php");
	}
?>

<html>
	<title>Patient panel | BANGABANDHU HEALTH CARE</title>
	<head> 
		<link rel="stylesheet" href="css/patientPanel.css">
		<link rel="shortcut icon" href="images/patienticon3.JPG">
	</head>
	
	<body>
		<h3 style="position: absolute;left:25px;top: 125px;">The basic services of BANGABANDHU HEALTH CARE :</h3></br>
		<ul style="top: 140px;">
		  <li> short-term hospitalization </li>
		  <li>  emergency room services </li>
		  <li>  general and specialty surgical services </li>
		  <li>  x ray/radiology services </li>
		  <li>  laboratory services </li>
		  <li>  blood services </li>
		</ul>

		<h3 style="position: absolute;left:25px;top: 275px;">BANGABANDHU HEALTH CARE's special and auxiliary services :</h3></br>
		<ul style="top: 310px;">
		  <li> pediatric specialty care</li>
		  <li> greater access to surgical specialists </li>
		  <li> physical therapy and rehabilitation services </li>
		  <li> prescription services </li>
		  <li> home nursing services </li>
		  <li> nutritional counseling </li>
		  <li> mental health care </li>
		  <li> family support services </li>
		  <li> genetic counseling and testing </li>
		  <li> social work or case management services </li>
		  <li> financial services </li>
		</ul> 

		<!-- ------------------------------------------------------------------------------------- -->
		<!-- Patient Icon -->
		<div>
			<a href="patientPanel.php?username=<?= $username ?>"><img class="ppi" src="images/patienticon3.jpg" alt="Patient Icon"></a>
		</div>
		<!-- Password Change Icon -->
		<div>
			<a href="patientPasswordChange.php?username=<?= $username ?>"><img class="passwordChange" src="images/changepasswordicon.png" alt="Password Change Icon"></a>
		</div>
		<!-- Make Appointment -->
		<div>
			<a href="#"><img class="makeappoitment" src="images/appointmenticon.png" alt="Make Appointment Icon"></a>
		</div>
		<!-- View Icon -->
		<div>
			<a href="patientView.php?username=<?= $username ?> "><img class="viewicon" src="images/viewicon.png" alt="View Icon"></a>
		</div>
		<!-- Search Doctor Icon -->
		<div>
			<a href="doctorDetails.php?username=<?= $username ?>"><img class="searchicon" src="images/searchicon.png" alt="Search Doctor Icon"></a>
		</div>

		<img class="pi" src="images/patienticon3.jpg">
		
		<div>
			<a href="patientLogin.php"><img class="logouticon" src="images/logouticon.jpg" alt="Logout Icon"></a>
		</div>
	</body>
</html>