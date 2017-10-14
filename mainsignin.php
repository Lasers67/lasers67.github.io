<!DOCTYPE html>
<?php
session_start();
 $db = mysqli_connect('localhost','root','Sunny4chaps','gasCyl')
 or die('Error connecting to MySQL server.');
?>
<html>
<head>
<title>SignIn</title>
<style>
	
	input, .company{

		-webkit-border-radius: 20px;
        -moz-border-radius: 20px;
		border-radius: 40px;
		font-size: 15px;
		padding:10px;
		width: 300px;
		height: 24px;
		position: absolute;
		display: block;
		text-align: center;
		background: #4e4c59;
		border-style: none;
		color: white;	
	}

	.left{
			margin-left: 300px;
			margin-top: 100px;
	}

	.Right{
			margin-left: 900px;
			margin-top: -300px;
	}

	button{

		webkit-border-radius: 80px;
        -moz-border-radius: 80px;
        border-style: none;
		border-radius: 20px;
		font-size: 15px;
		padding:10px;
		width: 320px;
		height: 50px;
		position: absolute;
		display: block;
		margin-left: 0px;
		text-align: center;
		margin-top: 40px;
		background:  #ed1c2a;
		color: white;	
	}

</style>
</head>
<body>
	<div class="box">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			<div class="left">
			<input type="text" placeholder="First Name" name="first"/>
			</br></br></br>
			<input type="text" placeholder="Last Name" name="second"/>
			</br></br></br>
			<input type="text" placeholder="E-mail Address" name="email"/>
			</br></br></br>
			<input type="text" placeholder="Registered Phone Number" name="phone"/>
			</br></br></br>
			<input type="password" placeholder="Password" name="pass"/>
			</br></br></br>
			<input type="text" placeholder="Gas Connection Number" name="gas"/>
			</br></br><br />
			<input type="text" placeholder="Number of Family Members" name="familyMemb"/>
			</br></br></br>
			<input type="text" placeholder="Address" name="address"/>
			</br></br></br>
			<input type="text" placeholder="Last Cleaned Gas Stove" name="lastcleaned"/>
			</br></br></br>
			<div class="company">
  				<select name="Company">
    				<option value="Indane">Indane</option>
    				<option value="Hindustan Petroleum">Hindustan Petroleum</option>
    			</select>
  			</div>
  			</div>
  			<div class="Right">
  				<p>After that 3 number of days of gas lasting</p>
  				<input type="text" placeholder="First Entry" name="previous1"/>
				</br></br></br>
				<input type="text" placeholder="Second Entry" name="previous2"/>
				</br></br></br>
  				<input type="text" placeholder="Third Entry" name="previous3"/>
  				</br></br></br>
				<button type="submit" name="submit">Sign In</button>
			</div>
		</form>
	</div>
<?php
if(isset($_POST['submit']))
{
$fname=$_POST['first'];
$lname=$_POST['second'];
$gascon=$_POST['gas'];
$pass=$_POST['pass'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$comp=$_POST['Company'];
$familynumb=(int)$_POST['familyMemb'];
$addr=$_POST['address'];
$lastCleaned=$_POST['lastcleaned'];
$_SESSION["name"]=$fname;
$num1=(int)$_POST['previous1'];
$num2=(int)$_POST['previous2'];
$num3=(int)$_POST['previous3'];
$query1 = "insert into login values('$gascon','$pass','$fname','$lname','$comp','$email','$phone',$familynumb,'Winter','$lastCleaned','$addr');";
//echo $query1;
mysqli_query($db, $query1) or die('Error querying database.');

$query2 = "create table ".$gascon." (NumbCyl int primary key auto_increment,NumberofDays int not null, DaysofDelivery int not null,Average int);";
mysqli_query($db, $query2) or die('Error querying database.');
$avg2=(int)($num1+$num2)/2;
$avg3=(int)($num1+$num2+$num3)/3;
$query3 = "INSERT INTO ".$gascon."(NumberofDays,DaysofDelivery,Average) values($num1,2,$num1),($num2,2,$avg2),($num3,2,$avg3);";
mysqli_query($db, $query3) or die('Error querying database.');
mysqli_close($db);
header("location:act.php");
}
?>
</body>
</html>
