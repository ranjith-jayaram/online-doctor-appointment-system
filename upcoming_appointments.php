<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "hospital management";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$patient_id = $_SESSION["patient_id"];

$sql = "SELECT * FROM appointment where patient_id = '$patient_id'";
$result=mysqli_query($conn,$sql);



echo "<h3>Number of appointments : " . $result->num_rows . "</h3>";

if ($result->num_rows > 0) {
    // output data of each row
    
    echo "<br>";

    while($row = $result->fetch_assoc()) {

    	$idtemp = $row["doc_id"];
    	$appidtemp = $row["appointment_id"];
    	$sqltemp = "SELECT * FROM doctor where doc_id = '$idtemp'";
		$resulttemp	=	mysqli_query($conn,$sqltemp);

		while($rowtemp = $resulttemp->fetch_assoc()) {
	        echo "Doctor Name:" . $rowtemp["name"];
	    }
    	echo "<br>Time:" . $row["timeofapp"] . "<br>Date:" . $row["dateofapp"] . "<br><br>";
    }
}


?>