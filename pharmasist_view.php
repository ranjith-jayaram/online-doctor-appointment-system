<?php
session_start();
$pharmasist_id = $_SESSION["pharmasist_id"];
if($pharmasist_id){
$servername = "localhost";
$username = "root";
$password = "";
$database = "hospital management";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM pharmacy where pharmacy_id ='$pharmasist_id'";
$result=mysqli_query($conn,$sql);

$rowcount=mysqli_num_rows($result);

if($rowcount != 1){
	echo "Wrong Credentials";
}
else{
	$row = $result->fetch_assoc();
	echo "<h2>Welcome Pharmasist " . $row["name"]. "</h2><b>Your Details:</b><br><br>Phone Number:" . $row["phone_no"]. "<br>Address:" . $row["address"]. "<br>";
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
Under Construction
</body>
</html>