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
    
    
    $target1 = "events.php?id=0&station=".$_GET["station"]."&line=".$row["line1"];
    $linkname1 = $row["line1"];
    echo "   <a href=\\$target1>$linkname1</a>";

    $target2 = "events.php?id=0&station=".$_GET["station"]."&line=".$row["line2"];
    $linkname2 = $row["line2"];
    echo "   <a href=\\$target2>$linkname2</a>";
    $target3 = "events.php?id=0&station=".$_GET["station"]."&line=".$row["line3"];
    $linkname3 = $row["line3"];
    echo "   <a href=\\$target3>$linkname3</a>";
    $target4 = "events.php?id=0&station=".$_GET["station"]."&line=".$row["line4"];
    $linkname4 = $row["line4"];
    echo "   <a href=\\$target4>$linkname4</a>";




}

?>