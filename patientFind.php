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
	    $admitID = $_POST['userName'];
	    $pUserName = $admitID;

        $sql = " SELECT * FROM `admit` WHERE admitID = '$admitID' ;";
        $sql2 = "SELECT `pName`, `pUserName`, `pPassword`, `pAge`, `pAddress`, `pPhoneNo`, `pBirthday`, `pGender` FROM `patient` WHERE `pUserName`='$pUserName' ";
        $sql3 = "SELECT `admitID`, `billAmount` FROM `bill` WHERE `admitID` = '@sharif' ;";

        $result = $conn->query($sql);
        $result2 = $conn->query($sql2);
        $result3 = $conn->query($sql3);

		if ($result->num_rows > 0) {
		    
		    /*----------------------------------------------------------*/
		    if ($result2->num_rows > 0) 
		    {
			    /*----------------------------------------------------------*/
			    if ($result2->num_rows > 0) {
			    // output data of each row
				    while($row = $result2->fetch_assoc()) 
				    {
				    	echo "<strong>"."Personal Information : "."</strong>"."<br>"."<strong>"."Name: " ."</strong>" .$row["pName"]. "<br>"."<strong>"."Address: " ."</strong>". $row["pAddress"]."<br>"."<strong>"."Phone No: " ."</strong>". $row["pPhoneNo"]. "<br>"."<strong>"."Birthday: " ."</strong>". $row["pBirthday"]."<br>"."<strong>"."Gender: " ."</strong>". $row["pGender"]. "<br>". "<br>";
			   		 }
			    	// output data of each row
				    while($row = $result->fetch_assoc()) 
				    {
				        echo "<strong>"."Admission Information : "."</strong>"."<br>"."<strong>"."User Name : " ."</strong>". $row["pUserName"]. "<br>"."<strong>"."Catagory : " ."</strong>". $row["catagory"]. "<br>"."<strong>"."Rooms : " ."</strong>". $row["room"]. "<br>"."<strong>"."Admitted Date : " ."</strong>". $row["date"]."<br>";
				    }
			    
			    	// output data of each row
				    while($row = $result3->fetch_assoc()) 
				    {
				        echo "<strong>"."Bill : "."</strong>"."<strong>".$row["billAmount"]. "<br>"."<br>";
				    }

			        
				}

				/*---------------------------------------------------------------------*/
			} 



		} 
			else 
			{
				//echo "Error: " . $sql . "<br>" . $conn->error;
			    echo "Invalid User Name";
			}
    }

    $conn->close();
    

?>

<!DOCTYPE html>
<html>
<head>
	<title>Find Patient | BANGABANDHU HEALTH CARE</title>
	<link rel="stylesheet" href="css/patientFind.css">
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

			<h2>SEARCH PATIENT</h2><br>
			<form class="form" action="" method="post">
			  <!--User Name -->
			  <label for="userName">User Name:</label>
			  <input class="formBox" type="text" id="userName" name="userName" placeholder=" Enter User Name" required><br><br>
			
			 <input style="background-color:white;" type="submit" value="SEARCH" name="resistration">
			</form>
		</div>

		<!-- Back -->
		<div>
			<a href="adminPanel.php"><img class="back" src="images/backicon.png" alt="Back Icon"></a>
		</div>
</body>
</html>