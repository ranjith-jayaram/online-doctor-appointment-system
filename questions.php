<?php
session_start();
$patient_id = $_SESSION["patient_id"];
if($patient_id){
$servername = "localhost";
$username = "root";
$password = "";
$database = "hospital management";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM patient where patient_id ='$patient_id'";
$result=mysqli_query($conn,$sql);

$rowcount=mysqli_num_rows($result);

if($rowcount != 1){
	echo "Wrong Credentials";
}
else{
	$row = $result->fetch_assoc();
	echo "<h2>Welcome " . $row["name"]. "</h2><b>Your Details:</b><br><br>Phone Number:" . $row["phone_no"]. "<br>Address:" . $row["address"]. "<br>";
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

<form method = "POST" action="algorithm.php">

	Time:<br>
	<select name="timeofapp">
	  <option value="9">9:00</option>
	  <option value="10">10:00</option>
	  <option value="11">11:00</option>
	  <option value="12">12:00</option>
	  <option value="1">1:00</option>
	  <option value="2">2:00</option>
	  <option value="3">3:00</option>
	  <option value="4">4:00</option>
	  <option value="5">5:00</option>
	  <option value="6">6:00</option>

	</select>
	<br><br>

	Date: (dd/mm/yyyy)<br>
	<input name = "dateofapp" type = "text">
	<br><br>	

	Type:<br>
	<select name="type">
	  <option value="1">Normal</option>
	  <option value="2">Dental care</option>
	  <option value="3">Eye Care</option>
	  <option value="4">Others</option>
	</select>
	<br><br>

	What Problem do you have:<br>
	<select name="problem">
	  <option value="1">head ache</option>
	  <option value="2">body pain</option>
	  <option value="3">stomach pain</option>
	  <option value="4">external wound</option>
	  <option value="5">chest pain</option>
	</select>
	<br><br>

	For how many days do you have it?:<br>
	<select name="problem">
	  <option value="1">1</option>
	  <option value="2">2</option>
	  <option value="3">3</option>
	  <option value="4">more than 3</option>
	</select>
	<br><br>

	severity:<br>
	<select name="problem">
	  <option value="1">low</option>
	  <option value="2">medium</option>
	  <option value="3">high</option>
	</select>
	<br><br>

	<input type="submit" value="Search">

</form>
</body>
</html>