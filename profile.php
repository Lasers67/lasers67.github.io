<!DOCTYPE html>
<?php
session_start();
 $db = mysqli_connect('localhost','root','Sunny4chaps','gasCyl')
 or die('Error connecting to MySQL server.');
?>
<html>
<head>
<title>Profile Page</title>
<style type="text/css">
	header{
		border-bottom: solid 1px black;
	}

	h1{
		text-align: center;
	}

	h3{
		margin-left : 10px;
	}

	.profile {
	border-left: 6px solid #FFD700;
    border-collapse: collapse;
    width: 100%;
    text-align: center;
	}

	.profile p {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    text-align: center;
	}

	.profile p:hover{background-color:#FFD700;}

</style>
</head>
<body>
<?php
$fname="Shashwat";
$query1 = "select * from login where FName='$fname';";
mysqli_query($db, $query1) or die('Error querying database.');
$result1 = mysqli_query($db, $query1);
$row1 = mysqli_fetch_array($result1);
$query2 = "select count(*) from ".$row1["GasConNumb"].";";
mysqli_query($db, $query2) or die('Error querying database.');
$result2 = mysqli_query($db, $query2);
$row2 = mysqli_fetch_array($result2);
$count=(int)$row2['count(*)'];
echo "<div class = \"profile\">";
echo "<h3>Profile</h3>";
echo "<header><h1>".$row1["FName"]."</h1></header>";
echo "<p>User : ".$row1["FName"]." ".$row1["LName"]."</p>";
echo "<p>Company delivering : ".$row1["GasCompany"]."</p>";
echo "<p>Already delivered cylinders : $count</p>";
echo "</div>";
mysqli_close($db);
?>
</body>
