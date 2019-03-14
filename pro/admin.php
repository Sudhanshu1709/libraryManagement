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

	$sql="SELECT * FROM admin WHERE id=".$user;
	$result = $conn->query($sql);


	if($result->num_rows>0)
	{
    $row=$result->fetch_assoc();
    if($pass!=$row['pass'])
    {
    	die("incorrect password");
    }
    $_SESSION['user']=$row['name'];
    $_SESSION['id']=$row['id'];
   

	}

	else
	{
		die("error b788");
	}
}
else if(isset($_SESSION['user']))

{
    if($_SESSION['TYPE']=="adb")
    	echo "<script> alert('book added');</script>";
    else if($_SESSION['TYPE']=="ib")
    	echo "<script> alert('book issued');</script>";
    elseif($_SESSION['TYPE']=="db") {
    	echo "<script> alert('book deposited');</script>";
    	# code...
    }

	
}
else
{
	die("access denied");
}
?>
<html>
<head>
	<style>
	body
	{
		padding: 0;
	}
	.ba
	{
		width: 100%;
		position: absolute;
		top:0;
		height: 10%;
		background-color: #55FF55;
		margin: 0;
	}
	.main
{
	position: absolute;
  top:10%;
  height: 100%;
  width: 100%;
  padding: 0;
  margin: 0;
  overflow: hidden;
}
#left
{
 position: absolute;
 top:0;
 left:0;
 margin: 0;
 background-color: #27527C;
 width: 20%;
 height: 100%;
 padding: 0;

}
#right
{
	position: absolute;
	top: 0;
	left:20%;
	width: 100%;
	border-color: #BE3E14;
	height: 100%;
}
#left ul
{
	padding: 0;
	margin: 0;
	list-style-type: none;
	width: 100%;
	height: 100%;
}
#left ul li
{
	margin: 0;
	padding: 0;
	width: 100%;
	

}
#left ul li a
{
	text-align: center;
	margin: 0;
	padding-top: 5%;
	padding-bottom: 5%;
	color: white;
	width: 100%;
	text-decoration-style: none;

	display: block;
}
#left ul li a::link
{
	text-decoration-style: none;
}
#left ul li a:hover
{
	background-color: black;
}
#right
{
	
}
.f
{
	position: absolute;
	top:0;
	left:0;
	width: 100%;
	height: 100%;
}
.f form 

{
	position: absolute;
	top:5%;
	left:20%;
	width: 30%;
	margin: auto;
	

height:60%;
padding:5%;
padding-top: 1%;
background-color: #CBCBF6;}
.f form input
{
	display: block;
	width: 100%;
	height: 10%;
	margin-bottom: 5%;
	
}

</style>
</head>
<body>
	<div class="ba">
	<center><h1>Admin Portal </h1></center>
	</div>
	<div class="main">
		<div id="left">
			<ul>
				<li><a id="adb">ADD BOOKS </a></li>
			<li><a id="ib">ISSUE </a></li>
			<li><a id="db">Deposite </a></li>
			<li><a id="st">Student </a></li>
		</ul>
		</div>

			<div id="right">
				<div id="addbook" class="f">
					<form action="addbook.php" method="POST">
						<center><h1>Book Detail</h1></center>
						<input type="text" name="bname" placeholder="BOOKS Name">
						<input type="text" name="aname" placeholder="Author Name">
						<input type="text" name="sb" placeholder="Serial Number">
						<input type="text" name="sub" placeholder="Subject Name">
								<input type="submit">
					</form>

				</div>
				<div id="issue" class="f" style="display: none;">
					<form action="issue.php" method="POST">
						<center><h1>Issue Book</h1></center>
						<input type="text" name="sno" placeholder="Serial no of book">
						<input type="text" name="rollno" placeholder="Roll no of Student">
					<input type="submit">
					</form>
				</div>
					<div id="deposit" class="f" style="display: none;">
					<form action="deposite.php" method="POST">
						<center><h1>Deposite Book</h1></center>
						<input type="text" name="sno" placeholder="Serial no of book">
						
					    <input type="submit">
					</form>


			</div>

			
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(e)
	{
		$("#adb").click(function(e)
			{
				$("#addbook").css("display","block");
				$("#issue").slideUp("slow");
				$("#deposit").slideUp("slow");
			});
		$("#ib").click(function(e)
			{

				$("#issue").css("display","block");
				$("#addbook").slideUp("slow");
				$("#deposit").slideUp("slow");

			});
		$("#db").click(function(e)
			{

				$("#deposit").css("display","block");
				$("#issue").slideUp("slow");
				$("#addbook").slideUp("slow");
			});
	}

		);

</script>

</body>