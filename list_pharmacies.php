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

$patient_id = $_SESSION["patient_id"];

$selected_description_id = $_POST["selected_description_id"];
$sql="SELECT * FROM pharmacy WHERE 1";
$result=mysqli_query($conn,$sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<h1>Pharmacies Available:</h1>";
    while($row = $result->fetch_assoc()) {
        echo "<form method = 'POST' action='book_medicine.php'>Pharmacy name : ". $row["name"]. "<br>Location : " . $row["address"] . "<br><input name='selected_pharmacy_id' type='text' value=". $row["pharmacy_id"]." hidden><input name='selected_description_id' type='text' value=". $selected_description_id." hidden><input type='submit' value='Order Here'></form><br>";
    }
} else {
    echo "0 results";
}

?>

