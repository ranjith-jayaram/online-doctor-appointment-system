<?php
session_start();
$doc_id = $_SESSION["doc_id"];
if($doc_id){
$servername = "localhost";
$username = "root";
$password = "";
$database = "hospital management";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM doctor where doc_id ='$doc_id'";
$result=mysqli_query($conn,$sql);

$rowcount=mysqli_num_rows($result);

if($rowcount != 1){
	echo "Wrong Credentials";
}
else{
	$row = $result->fetch_assoc();
	echo "<h2>Welcome Doctor " . $row["name"]. "</h2><b>Your Details:</b><br><br>Phone Number:" . $row["phone_no"]. "<br>Patients attended:" . $row["patient_count"]. "<br>Success Rate:" . $row["succ_rate"]. "%<br>Experience:" . $row["experience"]. " years<br>";
}
}
?>
<HTML>
<HEAD>
<TITLE>
Ouestion
</TITLE>
</HEAD>
<body bgcolor="lavender">
<br><br>
<font size="26" color="black">SIMS HOSPITAL</FONT>
<br><br><br>

<form method = "POST" action="list_patients.php">
	<input type="submit" value="View Appointments">
</form>

<form method = "POST" action="write_description.php">
	<input type="submit" value="Write Description">
</form>

</body>
</html>