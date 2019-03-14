<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->



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
if($_SERVER['REQUEST_METHOD']=="POST"){
$sql = "INSERT INTO student VALUES(".$_POST['rollno'].",'".$_POST['pass']."','".$_POST['name']."','".$_POST['fname']."',5,0);";


if ($conn->query($sql) === TRUE) {
    
    echo"<script> alert('Registration Successfull');</script>";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
 $conn->close();




?>

















<!DOCTYPE html>
<html>
<head>
<title>Flat Sign Up Form Responsive Widget Template| Home :: W3layouts</title>
<!-- Meta tag Keywords -->

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<!-- //css files -->
<!-- online-fonts -->

</head>
<body>
<!--header-->
	<div class="header-w3l">
		<h1>Library Registration Form</h1>
	</div>
<!--//header-->
<!--main-->
<div class="main-agileits">
	<h2 class="sub-head">Sign Up</h2>
		<div class="sub-main">	
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<input placeholder="First Name" name="name" class="name" type="text" required="">
					<br>
				<input placeholder="Father Name" name="fname" class="name2" type="text" required="">
					<br>
				<input placeholder="Roll Number" name="rollno" class="number" type="text" required="">
					<br>
				
					
				<input  placeholder="Password" name="pass" class="pass" type="password" required="">
					<br>
				
					<br>
				
				<input type="submit" value="sign up">
			</form>
		</div>
		<div class="clear"></div>
</div>
<!--//main-->

<!--footer-->
<
<!--//footer-->

</body>
</html>