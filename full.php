<!-- a page in order to communicate information to the data collection unit and the physical devices -->
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

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "INSERT INTO `full`(`line`, `time`)  VALUES ('". $_GET["line"] . "', '" . date("Y/m/d") ." ". date("H:i:s") .  "')";
    //echo $sql;
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    }
     else {
        //echo "fail";
    }
}

?>