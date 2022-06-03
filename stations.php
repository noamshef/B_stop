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
//echo $_GET["station"];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql= "SELECT `line1`, `line2`, `line3`, `line4` FROM `stations` WHERE `station`=".$_GET["station"];
    //echo $sql;
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo ($row["line1"]);
    echo "  ";
    echo ($row["line2"]);
    echo "  ";
    echo ($row["line3"]);
    echo "  ";
    echo ($row["line4"]);
}

?>