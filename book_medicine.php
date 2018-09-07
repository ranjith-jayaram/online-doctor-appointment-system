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
$selected_pharmacy_id = $_POST["selected_pharmacy_id"];
$selected_description_id = $_POST["selected_description_id"];

$patient_id = $_SESSION["patient_id"];

$sql = "INSERT INTO patient_booking (patient_id,pharmacy_id,desc_id,delivered) values ('$patient_id','$selected_pharmacy_id','$selected_description_id','no')";
$result=mysqli_query($conn,$sql);

$sql="SELECT * FROM patient_booking WHERE patient_id = '$patient_id' and pharmacy_id = '$selected_pharmacy_id' and desc_id = '$selected_description_id'";
$result=mysqli_query($conn,$sql);

if ($result->num_rows > 0) {
	echo "Order Success!!";
}
else
{
	echo "Order Failed! try after some time!";
}

?>