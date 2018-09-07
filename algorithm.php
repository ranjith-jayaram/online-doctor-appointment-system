<?php
session_start();

function calculateMatch($history,$distance,$experience,$succ_rate)
{
	$hr=$history*3/10;
	$dr=$distance*3/10;
	$er=$experience*2/10;
	$sr=$succ_rate*2/10;
	$match=$hr+$dr+$er+$sr;
	return $match;
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "hospital management";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$patient_id = $_SESSION["patient_id"];
$dateofapp = $_POST["dateofapp"];
$timeofapp = $_POST["timeofapp"];
$specid = $_POST["specid"];

$sql="SELECT * FROM patient WHERE patient_id = $patient_id";
$result=mysqli_query($conn,$sql);

$row = $result->fetch_assoc();

$nearest=$row["location"];

$sql="SELECT * FROM history WHERE patient_id = $patient_id";
$result=mysqli_query($conn,$sql);

$total_booking=0;

if ($result->num_rows > 0)
{
	while($row = $result->fetch_assoc()) {
		$total_booking = $total_booking + $row["count"];
	}
}


$sql="SELECT * FROM doctor WHERE spec_id = $specid";
$result=mysqli_query($conn,$sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<h1>Doctors Available:</h1>";
    while($row = $result->fetch_assoc()) {

		$doctemp=$row["doc_id"];
		$sqltemp="SELECT * FROM history WHERE patient_id = $patient_id AND doc_id=$doctemp";
		$resulttemp=mysqli_query($conn,$sqltemp);
		// echo "****".$resulttemp->num_rows;
		$rowtemp = $resulttemp->fetch_assoc();
		$currcount = $rowtemp["count"];
		// echo "currcou:".$currcount;

		$history = ($currcount/$total_booking)*100;
		// echo "<br>history:".$history;

		$currlocation = $row["location"];
		// echo "currlocation:".$currlocation;

		$sqltemp="SELECT * FROM map WHERE location = $nearest";
		$resulttemp=mysqli_query($conn,$sqltemp);
		$rowtemp = $resulttemp->fetch_assoc();
		$distkms = $rowtemp[$currlocation];
		// echo "distance in kms :".$distkms;

		$distance = (25-$distkms)*4;
		// echo "<br>distance:".$distance;


		$experience = 10*$row["experience"];
		//echo "<br>experience:".$experience;


		$succ_rate = $row["succ_rate"];
		//echo "<br>succ_rate:".$succ_rate;

		$match = calculateMatch($history,$distance,$experience,$succ_rate);

        echo "<form method = 'POST' action='booking.php'><h3>". $row["name"]. "<br>match = ".$match."%</h3><input name='selected_doc_id' type='text' value=". $row["doc_id"]." hidden><input name='timeofapp' type='text' value=". $timeofapp ." hidden><input name='dateofapp' type='text' value=". $dateofapp ." hidden>Patient Count: " . $row["patient_count"]. "<br>Success Rate: " . $row["succ_rate"]. "<br>Experience: " . $row["experience"]. "<br><input type='submit' value='Book'></form><br>";

    }
} else {
    echo "0 results";
}

?>

