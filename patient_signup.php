<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "hospital management";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST["name"];
$phno = $_POST["phno"];
$pw = $_POST["pw"];
$add = $_POST["add"];
$loc = $_POST["loc"];

$sql = "INSERT INTO patient (name,phone_no,password,address,location) VALUES('$name','$phno','$pw','$add','$loc')";

$result = mysqli_query($conn,$sql);

$sql="SELECT * FROM patient WHERE phone_no = '$phno'";
$result=mysqli_query($conn,$sql);

$rowcount=mysqli_num_rows($result);

if($rowcount == 1){
	echo "Signup Successfull! Go to login page to login.";
}
else{
	echo "Some error occurured. Try again after some time!";
}

?>