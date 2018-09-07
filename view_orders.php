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

$pharmacy_id = $_SESSION["pharmacy_id"];

$sql = "SELECT * FROM patient_booking where  pharmacy_id = '$pharmacy_id' and delivered= 'no'";
$result=mysqli_query($conn,$sql);



echo "<h3>Number of pending : " . $result->num_rows . "</h3>";

if ($result->num_rows > 0) {
    // output data of each row
    
    //echo "<br><br>";

    while($row = $result->fetch_assoc()) {

    	$idtemp = $row["patient_id"];
    	$descidtemp = $row["desc_id"];
        $delivered = $row["delivered"];

        if($delivered == "no"){

        	$sqltemp = "SELECT * FROM patient where patient_id = '$idtemp'";
    		$resulttemp	=	mysqli_query($conn,$sqltemp);

    		while($rowtemp = $resulttemp->fetch_assoc()) {
    	        echo "<br>Patient Name:" . $rowtemp["name"] . "<br>Address:" . $rowtemp["address"] . "<br>";
    	    }
        	echo "<form method = 'POST' action='delivered.php'><input name='desc_id' type='text' value=". $descidtemp . " hidden><input type='submit' value='Delivered'></form><br><br>";
        }
    }
}


?>