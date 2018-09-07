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

$sql = "SELECT * FROM description where patient_id = '$patient_id'";
$result=mysqli_query($conn,$sql);



echo "<h3>Descriptions : " . $result->num_rows . "</h3>";

if ($result->num_rows > 0) {
    // output data of each row
    
    while($row = $result->fetch_assoc()) {

    	$idtemp = $row["doc_id"];
    	$descidtemp = $row["desc_id"];
    	$sqltemp = "SELECT * FROM doctor where doc_id = '$idtemp'";
		$resulttemp	=	mysqli_query($conn,$sqltemp);

		while($rowtemp = $resulttemp->fetch_assoc()) {
	        echo "<br>Doctor Name:" . $rowtemp["name"];
	    }
    	echo "<br>Description:" . $row["description"] . "<br>";

        $sqlb = "SELECT * FROM patient_booking where desc_id = '$descidtemp'";
        $resultb=mysqli_query($conn,$sqlb);

        if ($resultb->num_rows == 0) {
            echo "<form method = 'POST' action='list_pharmacies.php'><input name='selected_description_id' type='text' value=". $descidtemp . " hidden><input type='submit' value='Book Medicine'></form>";
        }else
        {
            echo "<button  disabled=true>Already Booked<br></button></br>";
        }

    }
}


?>