<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = $_GET['q'];

$con = mysqli_connect('localhost:3306','root','','lib');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
$g = $_GET['t'];

$sql="SELECT * FROM book WHERE ".$g." = '".$q."';";
$result = mysqli_query($con,$sql);
if (mysqli_query($con, $sql)) {
    



echo "<table>
<tr>
<th>Serial No</th>
<th>Author</th>
<th>Book</th>
<th>Status</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['sno'] . "</td>";
    echo "<td>" . $row['author'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";
   
    echo "</tr>";
}
echo "</table>";

}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($con);
?>
</body>
</html>