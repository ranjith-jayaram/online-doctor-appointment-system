<html>
<head>
<script src="form.js" type="text/javascript"></script>
</head>
<body>

<script src="jquery.min.js">
</script>
<script type="text/javascript">
$(document).ready(function(){
    $("#create").click(function(){
        $("p").append("<br><br>");
    });
});
</script>

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
$selected_patient_id = $_POST["selected_patient_id"];
$selected_appointment_id = $_POST["selected_appointment_id"];
$doc_id = $_SESSION["doc_id"];


$sql="SELECT * FROM medicine WHERE 1";
$result=mysqli_query($conn,$sql);

?>

<h3>Add Description:</h3>

<button id="create" onclick="textBoxCreate()">Add Medicine</button>

<form method = 'POST' action='insert_description.php'>
	<p id="myForm"></p>
	Number Of Medicines : 
	<input name="count" style="width: 30px" id="count" type="text" value=0><br><br>
	<textarea name='desc' rows='4' cols='50'>
	</textarea><br><br>
	<input name="selected_appointment_id" type="text" value=<?php echo $selected_appointment_id; ?> hidden>
	<input name="selected_patient_id" type="text" value=<?php echo $selected_patient_id; ?> hidden><br>
	<input type="submit" value="Submit">
</form>

</body>
</html>