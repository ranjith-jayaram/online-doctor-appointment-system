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
$timeofapp = $_POST["timeofapp"];
$dateofapp = $_POST["dateofapp"];
$selected_doc_id = $_POST["selected_doc_id"];
$patient_id = $_SESSION["patient_id"];

$sql = "INSERT INTO appointment (doc_id,patient_id,timeofapp,dateofapp) values ('$selected_doc_id','$patient_id','$timeofapp','$dateofapp')";
$result=mysqli_query($conn,$sql);

$sql="SELECT * FROM appointment WHERE doc_id = '$selected_doc_id' and patient_id = '$patient_id' and timeofapp = '$timeofapp' and dateofapp = '$dateofapp'";
$result=mysqli_query($conn,$sql);

if ($result->num_rows > 0) {
	echo "Booking Success!!";
}
else
{
	echo "Booking Failed! try after some time!";
}

?>