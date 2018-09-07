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

$count = $_POST["count"];
$selected_patient_id = $_POST["selected_patient_id"];
$selected_appointment_id = $_POST["selected_appointment_id"];
$doc_id = $_SESSION["doc_id"];
$desc = $_POST["desc"];

$sql = "INSERT INTO description (doc_id,patient_id,description) values ('$doc_id','$selected_patient_id','$desc')";
$result=mysqli_query($conn,$sql);

$desc_id = $conn->insert_id;

$sql = "DELETE FROM appointment where appointment_id = '$selected_appointment_id'";
$result=mysqli_query($conn,$sql);

$sql = "SELECT * FROM history where doc_id = '$doc_id' AND patient_id = '$selected_patient_id'";
$result=mysqli_query($conn,$sql);

if ($result->num_rows == 0) {

	$sqlinsert = "INSERT INTO history(doc_id,patient_id,count) values ('$doc_id','$selected_patient_id',1)";
	$result=mysqli_query($conn,$sqlinsert);
}
else {
	$row = $result->fetch_assoc();
	$hcount = $row["count"];
	$hcount=$hcount+1;
	$sqlupdate = "UPDATE history SET count='$hcount' where doc_id = '$doc_id' AND patient_id = '$selected_patient_id'";
	$result=mysqli_query($conn,$sqlupdate);

}



while($count > 0){

	$tempname = "name_" . $count;
	$tempqty = "qty_" . $count;

	$nameval = $_POST[$tempname];
	$qtyval = $_POST[$tempqty];

	$sql="SELECT * FROM medicine WHERE name = '$nameval'";
	$result=mysqli_query($conn,$sql);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
    	$med_id = $row["med_id"];

		$sqltemp = "INSERT INTO description_expansion (desc_id,med_id,qty) values ('$desc_id','$med_id','$qtyval')";
		$resulttemp=mysqli_query($conn,$sqltemp);

		echo $nameval . " added<br>";
	}
	else {
	    echo $nameval . " is not available<br>";
	}
	$count--;
}
?>
