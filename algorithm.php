<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "hospital management";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$dateofapp = $_POST["dateofapp"];
$timeofapp = $_POST["timeofapp"];
$id = '101';
$sql="SELECT * FROM doctor WHERE spec_id = $id";
$result=mysqli_query($conn,$sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<h1>Doctors Available:</h1>";
    while($row = $result->fetch_assoc()) {
        echo "<form method = 'POST' action='booking.php'><h3>". $row["name"]. "</h3><input name='selected_doc_id' type='text' value=". $row["doc_id"]." hidden><input name='timeofapp' type='text' value=". $timeofapp ." hidden><input name='dateofapp' type='text' value=". $dateofapp ." hidden>Patient Count: " . $row["patient_count"]. "<br>Success Rate: " . $row["succ_rate"]. "<br>Experience: " . $row["experience"]. "<br><input type='submit' value='Book'></form><br>";
    }
} else {
    echo "0 results";
}

?>

