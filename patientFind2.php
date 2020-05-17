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
 
    /////////// Live search php code
   
    if (isset($_POST['query'])) {  
        $query = "SELECT * FROM admit WHERE admitID LIKE '{$_POST['query']}%'";
        $result = mysqli_query($conn, $query);
       
        if (mysqli_num_rows($result) > 0) {
            while ($user = mysqli_fetch_array($result)) {
                echo $user['admitID']."<br/>";
            }
        }
        else {
            echo "<p style='color:red'>User not found...</p>";
        }
    }
   
    $conn->close();
    //exit();
?>