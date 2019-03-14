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
if($_SERVER['REQUEST_METHOD']=="POST")
{
	$user=(int)$_POST['id'];
	$pass=$_POST['pass'];

	$sql="SELECT * FROM student WHERE rollno=".$user;
	$result = $conn->query($sql);


	if($result->num_rows>0)
	{
    $row=$result->fetch_assoc();
    if($pass!=$row['pass'])
    {
    	die("incorrect password");
    }
    $_SESSION['user']=$row['name'];
    $_SESSION['rollno']=$row['rollno'];
	}
	else
	{
		die("error b788");
	}
}
else
{
	die("access denied");
}
?>
<html>
<head>
	<link rel="stylesheet" href="css/student.css">
</head>
<body>
	<div id="top">
		<h2><center>Student Library Portal</center></h2>
		<div style="position: absolute;right:1%; top: 1%; text-align: center;color: white;font-weight: bold;"><?php echo$_SESSION['user'];?></div>
	</div>
	<div id="left">
		<ul><li><a id="adb">SEARCH BOOK </a></li>
			<li><a id="ib">E-BOOK</a></li>
			<li><a id="db">YOUR PAPER</a></li>
			<li><a id="st">ACCOUNT </a></li>
			<br>
			<br>
			<li><a >LOG OUT </a></li>
		</ul>

	</div>
	<div id="right">
		
			<input id="txt" type="text"  placeholder="enter book tag">
			<BUTTON onclick="showUser()">SEARCH</BUTTON>
			<div id="selector">
			<input type="radio" id="tag" name="gender" value="tag"> Tag 
  <input type="radio" name="gender" id="author" value="author"> Author 
  <input type="radio" name="gender" id="name" value="name"> Name </div>
		

		<div id="booktable">
		</div>
	</div>
	<script>
function showUser() {
    
       var v= document.getElementById("txt");
       var str=v.value;
        var tt;
        if (document.getElementById('tag').checked) {
       tt = document.getElementById('tag').value;
    }
    if (document.getElementById('author').checked) {
       tt = document.getElementById('author').value;
    }
    if (document.getElementById('name').checked) {
       tt = document.getElementById('name').value;
    }


    
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("booktable").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","books.php?q="+str+"&t="+tt,true);
        xmlhttp.send();
    }

</script>
</body>
</html>