<!DOCTYPE html>
<?php
session_start();
 $db = mysqli_connect('localhost','root','Sunny4chaps','gasCyl')
 or die('Error connecting to MySQL server.');
?>
<html>
<head>
<title>Login</title>
<style>
	input , button
	{
		-webkit-border-radius: 20px;
-moz-border-radius: 20px;
	border-radius: 20px;
	border-style: none;
	}
	#Username{
			position: absolute;
			top:240px;
			left:660px; 
			font-size: 12px;
			padding:3px;
			width: 230px;
			height: 30px;
			text-align: center;
			background: #4e4c59;
			color:white;
	}
	#Password{
			position: absolute;
			top:286px;
			left:660px;
			font-size: 12px;
			padding:3px;
			width: 230px;
			height: 30px;
			text-align: center;
			background: #4e4c59;
			color:white;
	}
	#Login{
			position: absolute;
			top:332px;
			left:660px;
			font-size: 12px;
			padding:4px;
			width: 236px;
			height: 37px;
			text-align: center;	
			background: #ed1c2a;
			color:white;
	}
	#New_user{
		position: absolute;
		left: 701px;
		top: 380px;
		color: blue;
		font-size:15px;
	}
#logerrbox{
	background-color:#666;
	border: 2px solid #444;
	top:150px;
	left:300px;
	position:fixed;
	overflow:hidden;
	width:600px;
	height:300px;
	text-align:center;
	z-index:1;
	opacity:0.9;
}
#logerrtext
{
	color: blue;
    text-align: center;
	font-weight:bold;
	overflow:hidden;
	z-index:1;
	top:100px;
	display:block;
	font-size:30px;
}
</style>
</head>
<body>
	<form method="POST" >
		<div class="box">
	 		<input type="text" id="Username" placeholder="Gas Connection Number" name="gascon"/>
			<input type="password" id="Password" placeholder="Password" name="pass"/>
			<button type="submit" id="Login">Log In</button>
		</div>
	</form>
	<a href="mainsignin.php" id="New_user">New to us? Register Here</a>
<?php
$query = "SELECT * FROM login";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);

while ($row = mysqli_fetch_array($result)) {
 if($row['GasConNumb']==$_POST["gascon"])
 {
 	if($row['Password']== $_POST["pass"])
	{
  		$_SESSION["name"]=$row['fname'];
  		header("Location:act.php");
  		exit();
  	}
	else
	{
		echo '<span id="logerrbox" onclick="pageRe()"><p id="logerrtext" style="color:red"></br></br></br>Wrong Password...!!! </br></p></span>';
		echo "<script type='text/javascript'> function pageRe(){";
		echo "window.open(\"mainlogin.php\",\"_self\");";
		echo "document.getElementById(\"logerrbox\").style=\"display:none;\";";
		echo "}";
		echo "</script>";
	}
 }
}
mysqli_close($db);
 ?>
</body>
</html>
