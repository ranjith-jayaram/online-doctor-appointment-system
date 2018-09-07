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

$desc_id = $_POST["desc_id"];

$sql = "UPDATE patient_booking set delivered = 'yes' WHERE desc_id = '$desc_id'";
$result=mysqli_query($conn,$sql);

echo "thank you!!";
?>