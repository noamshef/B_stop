<?php
$servername = "localhost";
$username = "root";
$password = "hackathon";
$dbname = "b_stop";
// Creating connection
$conn = new mysqli($servername, $username, $password, $dbname); //setting connection to database
// Check connection
if ($conn->connect_error) { //error message in order to deal with failed connection
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql= "SELECT * FROM `events` WHERE `station`=".$_GET["station"];
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          print_r($row);
          echo "<br>";
        }
}
}

?>