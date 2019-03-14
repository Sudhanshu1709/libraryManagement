<?php
$servername = "localhost:3306";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, "lib");

// Check connection
if ($conn->connect_error) {
    die("error". PHP_EOL);
}
session_start();
$sql="UPDATE book SET rollno=".$_POST['rollno'].",issueD=".time().",status=0 WHERE sno=".$_POST['sno'].";";

if ($conn->query($sql) === TRUE) {
    
    $_SESSION['TYPE']="ib";
    header("Location: admin.php");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 $conn->close();

?>