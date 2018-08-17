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

$sql = "SELECT * FROM doctor where phone_no = '$phno' AND password = '$pw'";
$result=mysqli_query($conn,$sql);

$rowcount=mysqli_num_rows($result);

if($rowcount != 1){
	echo "Wrong Credentials";
}
else{
	echo "Welcome";
	$row = $result->fetch_assoc();
    $_SESSION["doc_id"] = $row["doc_id"];
	header("Location: http://localhost/hospital%20management/doctor_view.php"); /* Redirect browser */
	//exit();
}

?>