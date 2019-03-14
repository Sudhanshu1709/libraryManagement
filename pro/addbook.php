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
if(isset($_SESSION['user']))
{

$sql = "INSERT INTO book VALUES(".$_POST['sb'].",'".$_POST['aname']."','".$_POST['bname']."','".$_POST['sub']."',1,0,0);";

if ($conn->query($sql) === TRUE) {
    
    $_SESSION['TYPE']="adb";
    header("Location: admin.php");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 $conn->close();

}
else
{
	die("error session not set");
}


?>