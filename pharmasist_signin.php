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

$sql = "SELECT * FROM pharmacy where phone_no = '$phno' AND password = '$pw'";
$result=mysqli_query($conn,$sql);

$rowcount=mysqli_num_rows($result);

if($rowcount != 1){
	echo "Wrong Credentials";
}
else{
	echo "Welcome";
	$row = $result->fetch_assoc();
    $_SESSION["pharmacy_id"] = $row["pharmacy_id"];
	header("Location: http://localhost/hospital%20management/pharmasist_view.php"); /* Redirect browser */
	//exit();
}

?>