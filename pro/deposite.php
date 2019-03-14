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
$sql="UPDATE book SET rollno=0,issueD=0,status=1 WHERE sno=".$_POST['sno'].";";

if ($conn->query($sql) === TRUE) {
    
    $_SESSION['TYPE']="db";
    header("Location: admin.php");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 $conn->close();
?>