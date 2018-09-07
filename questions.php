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
<script>
	function booking(){
		var x = document.getElementById("book");
		if (x.style.display === "none") {
	        x.style.display = "block";
	    } else {
	        x.style.display = "none";
	    }
	}
</script>
</HEAD>
<body bgcolor="lavender">
<br><br>

<form method = "POST" action="upcoming_appointments.php">
	<input type="submit" value="View Appointments">
</form>

<form method = "POST" action="view_descriptions.php">
	<input type="submit" value="View Descriptions">
</form>

<button onclick="booking()">Book Appointment</button><br><br>

<div id="order" style="display: none">
<br><br>
hahaha
</div>

<div id="book" style="display: none">
	<br><br>
<form method = "POST" action="algorithm.php">

	Booking type:<br>
	<select name="specid">
	  <option value="0">--SELECT--</option>
	  <option value="101">Skin Problems</option>
	  <option value="102">Sugar Problem</option>
	  <option value="103">Mental Instability</option>
	  <option value="104">Heart Problems</option>
	  <option value="105">Dental</option>
	  <option value="106">General Operation</option>
	  <option value="107">Eye Care</option>
	  <option value="108">Child Specialist</option>
	  <option value="109">Injuries</option>
	  <option value="110">Reproductive Problems</option>
	</select>
	<br><br>

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

		<input type="submit" value="Search">

</form>
</div>
</body>
</html>