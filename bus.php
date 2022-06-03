
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
    $sql= "SELECT * FROM `events` WHERE `line`=".$_GET["line"]." AND `station`=".$_GET["station"];
    //echo $sql;
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if(empty($row)){
        echo "0";
    }
    else{
        echo "1";
    }
}

?>