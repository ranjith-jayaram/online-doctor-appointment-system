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

$doc_id = $_SESSION["doc_id"];

$sql = "SELECT * FROM appointment where doc_id = '$doc_id'";
$result=mysqli_query($conn,$sql);



echo "<h3>Number of appointments : " . $result->num_rows . "</h3>";

if ($result->num_rows > 0) {
    // output data of each row
    
    echo "<br><br>";

    while($row = $result->fetch_assoc()) {

    	$idtemp = $row["patient_id"];
    	$appidtemp = $row["appointment_id"];
    	$sqltemp = "SELECT * FROM patient where patient_id = '$idtemp'";
		$resulttemp	=	mysqli_query($conn,$sqltemp);

		while($rowtemp = $resulttemp->fetch_assoc()) {
	        echo "Patient Name:" . $rowtemp["name"];
	    }
    	echo "<br>Time:" . $row["timeofapp"] . "<br>Date:" . $row["dateofapp"] . "<br>";
    	echo "<form method = 'POST' action='add_discription.php'><input name='selected_patient_id' type='text' value=". $row["patient_id"]." hidden><input name='selected_appointment_id' type='text' value=". $appidtemp . " hidden><input type='submit' value='Write Description'></form><br><br>";
    }
}


?>