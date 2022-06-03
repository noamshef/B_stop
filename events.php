
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
    $sql = "INSERT INTO `events`(`id`, `station`, `line`, `arrive time`)  VALUES ('"   . $_GET["id"] . "', '" . $_GET["station"] . "', '" . $_GET["line"] . "', '" . date("Y/m/d") ." ". date("H:i:s") .  "')";
    //echo $sql;
    if ($conn->query($sql) === TRUE) {
        echo "Waiting for line ".$_GET["line"].",hang tight!";
    }
     else {
        //echo "fail";
    }
}

?>