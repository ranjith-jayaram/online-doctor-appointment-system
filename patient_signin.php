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

$phno = $_POST["phno"];
$pw = $_POST["pw"];

$sql = "SELECT * FROM patient where phone_no = '$phno' AND password = '$pw'";
$result=mysqli_query($conn,$sql);

$rowcount=mysqli_num_rows($result);

if($rowcount != 1){
	echo "Wrong Credentials";
}
else{
	echo "Welcome";
	$row = $result->fetch_assoc();
    $_SESSION["patient_id"] = $row["patient_id"];
	header("Location: http://localhost/hospital%20management/questions.php"); /* Redirect browser */
	//exit();
}

?>