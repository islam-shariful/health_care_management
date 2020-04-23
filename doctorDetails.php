<?php
	$username = $_GET['username'];

	//session_start();
	if(!isset($_COOKIE['loggedInUser']))
	{
		header("Location:patientLogin.php");
	}
	
?>

<html>
	<title>Doctor Details | BANGABANDHU HEALTH CARE</title>
	<head> 
		<link rel="stylesheet" href="css/doctorDetails.css">
		<link rel="shortcut icon" href="images/patienticon3.JPG">
	</head>
	<!--  style="color:blue;top:20px;" -->
	<body>
		<h1 style="color:Black;position:absolute;top:75px;left:575px;">Doctor Details</h1>
		<div>
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
			<a href="patientView.php?username=<?= $username ?>"><img class="viewicon" src="images/viewicon.png" alt="View Icon"></a>
		</div>
		<!-- Search Doctor Icon -->
		<div>
			<a href="doctorDetails.php?username=<?= $username ?>"><img class="searchicon" src="images/searchicon.png" alt="Search Doctor Icon"></a>
		</div>

		<!-- >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> -->

			<div class="doctorimagetop">
				<img class="doctorimage" src="images/sharif2.jpg" alt="doctor Image"></br>
				<b>Name:</b> <i>Hossain Sharif</i></br>
				<b>Age:</b> <i>23</i></br>
				<b>Speciality:</b> <i>Neurologist</i></br>
				<b>Email:</b> <i>hossainsharif058@gmail.com</i></br>
				<b>Phone:</b> <i>+8801706569026</i>
			</div>
			<div class="doctorimageleft">
				<img class="doctorimage" src="images/sharif.jpg" alt="doctor Image"></br>
				<b>Name:</b> <i>Islam Md. Shariful</i></br>
				<b>Age:</b> <i>23</i></br>
				<b>Speciality:</b> <i>Psychiatrist</i></br>
				<b>Email:</b> <i>imdshariful171@gmail.com</i></br>
				<b>Phone:</b> <i>+8801632466063</i>
			</div>
			<div class="doctormageleftmiddle">
				<img class="doctorimage" src="images/imran.png" alt="doctor Image"></br>
				<b>Name:</b> <i>Prodhan Imran</i></br>
				<b>Age:</b> <i>23</i></br>
				<b>Speciality:</b> <i>Immunologist</i></br>
				<b>Email:</b> <i>prodhanimran@gmail.com</i></br>
				<b>Phone:</b> <i>+8801834820711</i>
			</div>
			<div class="doctormagerightmiddle">
				<img class="doctorimage" src="images/ifty.png" alt="doctor Image"></br>
				<b>Name:</b> <i>Ifty Al-Amin</i></br>
				<b>Age:</b> <i>23</i></br>
				<b>Speciality:</b> <i>Rheumatologist</i></br>
				<b>Email:</b> <i>iftialmin73@gmail.com</i></br>
				<b>Phone:</b> <i>+8801797297617</i>
			</div>
			<div class="doctorimageright">
				<img class="doctorimage" src="images/tawheed.png" alt="doctor Image"></br>
				<b>Name:</b> <i>Anjum Tawheed</i></br>
				<b>Age:</b> <i>23</i></br>
				<b>Speciality:</b> <i>Endocrinologist</i></br>
				<b>Email:</b> <i>tawheed256@gmail.com</i></br>
				<b>Phone:</b> <i>+8801774009104</i>
			</div>






		</div>







		
		<div>
			<a href="patientPanel.php"><img class="back" src="images/backicon.png" alt="Back Icon"></a>
		</div>
	</body>
</html>