<?php
	session_start();
	if(!isset($_SESSION['adminName']))
	{
		header("Location:adminLogin.php");
	}
	
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "bhc";
	
	// Create connection
	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	$error_msg['pNameError'] = $error_msg['pUserNameError'] = $error_msg['pAgeError'] = $error_msg['pAddressError'] = $error_msg['pPhoneNoError'] = $error_msg['pBirthdayError'] = $error_msg['pGenderError'] = "*";
	$pName = $pUserName = $pAge = $pAddress = $pPhoneNo = $pBirthday = $pGender = "";
	//Resistration
    if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
	 	function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
		//$pNameError = "Must be filled";
		//empty check

		//Full Name empty & special char check
		if (empty($_POST["fullName"])) {
			    $error_msg['pNameError'] = "* Full Name is required";
		} 
		else if (!preg_match("/^[a-zA-Z ]*$/",$_POST["fullName"])) {
		        $error_msg['pNameError'] = "* Only letters and white space allowed";
		}
		else {
			$pName = test_input($_POST["fullName"]);
		}
		//Username empty check
		if (empty($_POST["userName"])) {
			    $error_msg['pUserNameError'] = "* User Name is required";
		} else {
			$pUserName = test_input($_POST["userName"]);
		}
		//Age empty and number check
		if (empty($_POST["age"])) {
			$error_msg['pAgeError'] = "* Age is required";
		}
		else if ( !is_numeric($_POST["age"]) ) {
		        $error_msg['pAgeError'] = "* Only digits are allowed";
		}
		else {
			$pAge = test_input($_POST["age"]);
		}
		//Address empty check
		if (empty($_POST["address"])) {
			$error_msg['pAddressError'] = "* Address is required";
		} else {
			$pAddress = test_input($_POST["address"]);
		}
		//phone No empty and number check
		if (empty($_POST["phoneNo"])) {
			$error_msg['pPhoneNoError'] = "* Phone No is required";
		}
		else if ( !is_numeric($_POST["phoneNo"]) ) {
		        $error_msg['pPhoneNoError'] = "* Only digits are allowed";
		}
		else {
			$pPhoneNo = test_input($_POST["phoneNo"]);
			
		}
		//Birthday
		if (empty($_POST["birthday"])) {
			$error_msg['pBirthdayError'] = "* Birthday is required";
		} else {
			$pBirthday = test_input($_POST["birthday"]);
		}
		//Gender
		if (empty($_POST["gender"])) {
			$error_msg['pGenderError'] = "* Gender is required";
		} else {
			$pGender = test_input($_POST["gender"]);
		}


		if ( $error_msg['pNameError'] != "*" || $error_msg['pUserNameError'] !="*" || $error_msg['pAgeError'] != "*" || $error_msg['pAddressError'] != "*" || $error_msg['pPhoneNoError'] != "*" || $error_msg['pBirthdayError'] != "*" || $error_msg['pGenderError'] != "*" ) {
			echo "Invalid Input";
	    //die();
		 } 
		 else 
		 {
		 	$sql = "INSERT INTO `patient`(`pName`, `pUserName`, `pAge`, `pAddress`, `pPhoneNo`, `pBirthday`, `pGender`) VALUES ('$pName','$pUserName','$pAge','$pAddress','$pPhoneNo','$pBirthday','$pGender');";

			if ($conn->query($sql) === TRUE) {
			    echo "New record created successfully";
			} else {
			    //echo "Error: " . $sql . "<br>" . $conn->error;
			    //echo "Invalid Info";
			}
		  }

		/*
	    $ = test_input($_POST['']);
	    $ = test_input($_POST['']);
	    $ = test_input($_POST['']);
	    $ = test_input($_POST['']);
	    $ = test_input($_POST['']);
	    $ = test_input($_POST['']);
	    $ = test_input($_POST['']);
		*/
	    

       
	  
	  

    }

    $conn->close();
    

?>

<!DOCTYPE html>
<html>
<head>
	<title>Patient Management | BANGABANDHU HEALTH CARE</title>
	<link rel="stylesheet" href="css/patientManagement.css">
	<link rel="shortcut icon" href="images/adminicon5.JPG">
</head>
<body>
	<!-- ------------------------------------------------------------------------------------- -->
		<!-- Add Patient Icon -->
		<div class="iconToHover">
			<a href="patientManagement.php"><img class="api" src="images/adddoctoricon.png" alt="Add Patient Icon"></a>
			<span class="hoverText">REGISTER PATIENT</span>
		</div>
		<!-- Admit Patient Icon -->
		<div class="iconToHover">
			<a href="admitPatient.php"><img class="admitPatientIcon" src="images/admiticon.jpg" alt="Add Patient Icon"></a>
			<span class="hoverText">ADMIT PATIENT</span>
		</div>
		<!-- Delete Patient Icon -->
		<div class="iconToHover">
			<a href="patientDelete.php"><img class="dpi" src="images/deletedoctoricon.png" alt="Delete Patient Icon"></a>
			<span class="hoverText">RELEASE PATIENT</span>
		</div>
		<!-- Update Patient Icon -->
		<div class="iconToHover">
			<a href="patientModify.php"><img class="upi" src="images/updatedoctoricon.png" alt="Update Patient Icon"></a>
			<span class="hoverText">MODIFY PATIENT</span>
		</div>
		<!-- View Patient Icon -->
		<div class="iconToHover">
			<a href="patientViewA.php"><img class="vpi" src="images/viewicon.png" alt="View Patient Icon"></a>
			<span class="hoverText">VIEW PATIENT</span>
		</div>
		<!-- Search Patient Icon -->
		<div class="iconToHover">
			<a href="patientFind.php"><img class="spi" src="images/searchicon.png" alt="Search Patient Icon"></a>
			<span class="hoverText">SEARCH PATIENT</span>
		</div>
		<!-- ---------------------------------------------------------------------------- -->
	<div class="register">

			<h2>REGISTER PATIENT</h2><br>

			<p><span class="error">* required field</span></p>

			<form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			  <!-- Name -->
			  <label for="fullName">Name:</label>
			  <input class="formBox" type="text" id="fullName" name="fullName" placeholder=" Enter Full Name"><span style="color: #FF0000;padding-left: 195px;"> <?php echo $error_msg['pNameError'];?></span>
  			  <br><br>
			  <!--User Name -->
			  <label for="userName">User Name:</label>
			  <input class="formBox" type="text" id="userName" name="userName" placeholder=" Enter User Name">
			  <span style="color: #FF0000;padding-left: 160px;"> <?php echo $error_msg['pUserNameError'];?></span>
			  <br><br>
			  <!-- Age -->
			  <label for="age">Age:</label>
			  <input class="formBox" type="text" id="age" name="age" placeholder=" Enter Age">
			  <span style="color: #FF0000;padding-left: 205px;"> <?php echo $error_msg['pAgeError'];?></span>
			  <br><br>
			  <!-- Address -->
			  <label for="address">Address:</label>
			  <input class="formBox" type="text" id="address" name="address" placeholder=" Enter Address">
			  <span style="color: #FF0000;padding-left: 180px;"> <?php echo $error_msg['pAddressError'];?></span>
			  <br><br>
			  <!-- Phone -->
			  <label for="phoneNo">Phone No:</label>
			  <input class="formBox" type="text" id="phoneNo" name="phoneNo" placeholder=" Enter Unique Phone No.">
			  <span style="color: #FF0000;padding-left: 170px;"> <?php echo $error_msg['pPhoneNoError'];?></span>
			  <br><br>
			  <!-- Birthday -->
			  <label for="birthday">Birthday:</label>
 			  <input class="formBox" type="date" id="birthday" name="birthday">
 			  
 			  <span style="color: #FF0000;padding-left: 150px;"> <?php echo $error_msg['pBirthdayError'];?></span>
 			  
 			  <br><br>

 			  <!-- Gender -->
 			  Gender : </br>
 			  <div>
	 			  <input type="radio" id="male" name="gender" value="male">
				  <label for="male">Male</label><br>
				  <input type="radio" id="female" name="gender" value="female">
				  <label for="female">Female</label><br>
				  <input type="radio" id="other" name="gender" value="other">
				  <label for="other">Other</label>
				  <span style="color: #FF0000;padding-left: 20px;"> <?php echo $error_msg['pGenderError'];?></span>
				  <br><br>
				</div></br>

			
			 <input style="background-color:white;" type="submit" value="RESISTRATION" name="resistration">
			</form>
		</div>

		<!-- Back -->
		<div>
			<a href="adminPanel.php"><img class="back" src="images/backicon.png" alt="Back Icon"></a>
		</div>
</body>
</html>