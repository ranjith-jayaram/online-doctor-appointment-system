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
$pat_atd = $_POST["pat_atd"];
$sr = $_POST["sr"];
$qual = $_POST["qual"];
$exp = $_POST["exp"];
$spl = $_POST["spl"];
$loc = $_POST["loc"];
$rate = $_POST["rate"];
$avail_time = $_POST["avail_time"];

switch($spl)
{
	case 101:
	$specname='dermatologist';
	break;
	case 102:
	$specname='diabetologist';
	break;
	case 103:
	$specname='psychiatrist';
	break;
	case 104:
	$specname='cardiologist';
	break;
	case 105:
	$specname='dental surgeon';
	break;
	case 106:
	$specname='surgeon';
	break;
	case 107:
	$specname='ophthalmologist';
	break;
	case 108:
	$specname='paediatrician';
	break;
	case 109:
	$specname='orthopaedic surgeon';
	break;
	case 110:
	$specname='gynaecologist';
	break;
}

switch($loc)
{
	case 1:
	$locname='anna nagar';
	break;
	case 2:
	$locname='egmore';
	break;
	case 3:
	$locname='nungambaakam';
	break;
	case 4:
	$locname='vadapalani';
	break;
	case 5:
	$locname='tnagar';
	break;
	case 6:
	$locname='porur';
	break;
	case 7:
	$locname='guindy';
	break;
	case 8:
	$locname='adyar';
	break;
	case 9:
	$locname='velachery';
	break;
	case 10:
	$locname='chromepet';
	break;
}


$sql = "INSERT INTO doctor (name,phone_no,password,patient_count,succ_rate,experience,location,location_id,spec_id,specialization,rating,qualification,available_time) VALUES('$name','$phno','$pw','$pat_atd','$sr','$exp','$locname','$loc','$spl','$specname','$rate','$qual','$avail_time')";

$result = mysqli_query($conn,$sql);

$sql="SELECT * FROM doctor WHERE phone_no = '$phno'";
$result=mysqli_query($conn,$sql);

$rowcount=mysqli_num_rows($result);

if($rowcount == 1){
	echo "Signup Successfull! Go to login page to login.";
}
else{
	echo "Some error occurured. Try again after some time!";
}

?>