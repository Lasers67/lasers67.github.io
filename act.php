<!DOCTYPE html>
<?php
session_start();
 $db = mysqli_connect('localhost','root','Sunny4chaps','gasCyl')
 or die('Error connecting to MySQL server.');
?>
<html>
<title>Kuch Bhi Rakh Lo</title>
<meta charset="UTF-8">  
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5,a{font-family: "Raleway", sans-serif}
a{
  text-decoration: none;}
#a{
  height: 40px;
  border:none;
  background: black;
  color:white;
}
#Order{
  padding: 27px;
  text-align: center;
}
.Cleaneddate{
  height: 40px;
  padding: -200px;
}
.box {
            width: 284px;
            text-align: center;
            position: absolute;
            top:112px;
            padding: 15px;
            background: green;
            left: 918px;
          }
        
          .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            transition: opacity 500ms;
            visibility: visible;
            opacity: 1;
          }
          .overlay:target {
            visibility: hidden;
            opacity: 0;
            display:none
          }
          .popup {
            margin: 70px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            width: 30%;
            position: relative;
            transition: all 5s ease-in-out;
          }
          .popup h2 {
            margin-top: 0;
            color: #333;
            font-family: Tahoma, Arial, sans-serif;
          }
          .popup .close span{
            position: absolute;
            top: 20px;
            right: 30px;
            transition: all 200ms;
            font-size: 20px;
            font-weight: bold;
            text-decoration: none;
            color: #333;
          }
           .popup .content {
            max-height: 30%;
            overflow: auto;
          }
          #Submit{
            position: absolute;
            top:140px;
            left: 380px;
          }
          #GasStove{
            height: 45px;
            margin-left : 10px;
            border-style: none;
            border-radius: 80px;
            background-color: blue;
            color : white;  
          }
          #enterdate{
            border-radius: 10px;
            border-style: none;
            height : 30px;
            text-align: center;
          }
          #submit{
            position: absolute;
            top:140px;
            left: 380px;
            height : 50px;
            margin-left: -100px;
            border-radius: 10px;
            border-style: none;
            padding-top: 20px;
            padding-bottom:40px;
            padding-left:30px ;
            padding-right:30px; 
            text-align: center;
            color: white;
            background: green;
            top : 125px;
          }
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i> Menu</button>
  <button id="a" class="w3-bar-item w3-right">Logout</button>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="User.jpg" width="70px" height="70px" />
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong>Sylvia</strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>  
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="https://www.sbi.co.in/" class="w3-bar-item w3-button w3-padding"> Order Now!</a>
    <a href="#Log" class="w3-bar-item w3-button w3-padding"><img>LogBook</a>
    <a href="#Prof" class="w3-bar-item w3-button w3-padding"><img>My Profile</a>
    <a href="#Stat" class="w3-bar-item w3-button w3-padding"><img>Show My Stats</a>
    <a href="#Team" class="w3-bar-item w3-button w3-padding"><img>Our Team</a><br><br>
  </div>
</nav>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>
  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"></div><a href="https://www.sbi.co.in/">
        <div class="w3-clear"></div>
        <h4 id="Order">OrderNow!!</h4></a>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php $fname=$_SESSION["name"];
          		$query1="select * from login where FName='$fname';";
          		mysqli_query($db, $query1) or die('Error querying database.');
          		$result=mysqli_query($db, $query1);
          		$row1=mysqli_fetch_array($result);
          		$gas=$row1['GasConNumb'];
          		$query2="select * from ".$gas." order by NumbCyl desc limit 1;";
          		$result=mysqli_query($db, $query2);
          		$row2=mysqli_fetch_array($result);
          		$query3="select count(*) from ".$gas.";";
          		$result=mysqli_query($db, $query2);
          		$row3=mysqli_fetch_array($result);
          		$daycount=$row3['count(*)'];
          		$date1=strtotime($row1['LastUpdatedGasStove']);
          		$date2=strtotime(date('Y-m-d'));
          		$n=(($date2-$date1)/(3600*24));
          		if(!((date('m')<=10) && (date('m')>=4)))
          			echo (int)(($row2['Average']/1.1)-0.01*$n*$n);
          		else
          			echo (int)($row2['Average']-0.01*$n*$n);
          		?>
          		</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Days Left</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="box">
        <div class="w3-right"><a class="button" href="#">
          <h3><br /></h3>
        </div>
        <div class="w3-clear"></div>
        <div class="w3-left"><img src="download.png" width="45px" height="45px"></div>
        <h4>Upcoming Schedules</h4>

    </div> 

    <div id="popup1" class="overlay">
      <div class="popup" >
        <a class="close" href="#popup1"><span>X</span><button id="submit">Submit</button></a>
        <div class="content">
        <h2>On Holiday !</h2>
            <input type="text" placeholder="From" name="vacfrom"/></br>
            <input type="text" placeholder="To" name="vacto"/>
            </br></br>
            <h2>Guests !</h2>
            <input type="text" placeholder="From" name="Guestsfrom"/></br>
            <input type="text" placeholder="To" name="Gueststo"/></br>
            <input type="text" placeholder="GuestsNumber" name="Num"/>
        </div>
      </div>
    </div>

      </div>
    </div>
    </a>
    <div class="Cleaneddate">
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"></div>
        <div class="w3-right">
          <h3></h3>
        </div>
        <div class="w3-clear"></div>
        <h4 >Last Cleaned Gas Stove</h4>
        <input type="text" id="enterdate" placeholder="Enter date dd/mm/yy" >
        <button type="Submit" id="GasStove" name="submit">Submit</button>
<a name="Log"></a> 
      </div>
    </div>
  </div>
  </div>
  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-twothird">
        <h5>Logbook</h5>
        <table class="w3-table w3-striped w3-white">
          <?php
            	$fname=$_SESSION["name"];
          		$query1="select * from login where FName='$fname';";
          		mysqli_query($db, $query1) or die('Error querying database.');
          		$result=mysqli_query($db, $query1);
          		$row1=mysqli_fetch_array($result);
          		$gas=$row1['GasConNumb'];
         		$date1=$row1['LastUpdatedGasStove'];
          		$query2="SELECT * FROM (   SELECT *    FROM ".$gas." ORDER BY NumbCyl DESC LIMIT 5 ) AS ".$gas." ORDER by NumbCyl ASC;";
          		$result=mysqli_query($db, $query2);
          		$i=1;
          		while($row2=mysqli_fetch_array($result))
          		{
          			echo "<tr>";
            		echo "<td>$i - $date1</td>";
          			echo "</tr>";
          			$i=$i+1;
          			$last1=$row2['NumberofDays'];
          			$date1=strtotime("+".$row2['NumberofDays']." days", strtotime($date1));
				    $date1= date("Y-m-d", $date1);
          		}
    			$date1=strtotime("-".$last1." days", strtotime($date1));
				$date1= date("Y-m-d", $date1);
            echo "<td><b>Last Cleaned Stove:-</b></td>";
            echo "<td><b>".$date1."</b></td>";
            echo "<td></td>";
          	echo "</tr>";
          	?>
        </table>
      </div>
    </div>
  </div>
  <hr>

  <div class="w3-container"><a name="Prof"></a>
    <h5>My Profile</h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
      <tr>
        <td>First Name:-</td>
        <td>Pratyush</td>
      </tr>
      <tr>
        <td>Last Name</td>
        <td>Gaurav</td>
      </tr>
      <tr>
        <td>Address</td>
        <td>B-8 Molarband Village Main Jaitpur Road</td>
      </tr>
      <tr>
        <td>City</td>
        <td>Delhi</td>
      </tr>
      <tr>
        <td>State</td>
        <td>Delhi</td>
      </tr>
      <tr>
        <td>Gas Registration Number</td>
        <td>DS141A</td>
      </tr>
    <tr>
        <td>Gas Company</td>
        <td>Bharat Gas</td>
      </tr>
      
      <tr>
        <td>Email</td>
        <td>pratyushgauravgo@gmail.com</td>
      </tr>
    </table><br>
  </div>
  <hr>

 
  <br>
  <a name="Team"></a>
  <div class="w3-container w3-dark-grey w3-padding-32">
    <div class="w3-row">
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-green">Pratyush Gaurav</h5>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-red">Sylvia Mittal</h5>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-orange">Shashwat Garg</h5>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4></h4>
    <p><center><span href="https://www.w3schools.com/w3css/default.asp" target="_blank">Powered by Kuch Bhi Rakh Lo</span></center></p>
  </footer>
  <!-- End page content -->
</div>
<?php
if(isset($_POST['submit']))
{
$from=strtotime(date('Y-m-d',$_POST['vacfrom']));
$to=strtotime(date('Y-m-d',$_POST['vacto']));
$diff=(($to-$from)/(3600*24));
$query1 = "select * from ".$gas." order by NumbCyl desc limit 1";
mysqli_query($db, $query1) or die('Error querying database.');
$result=mysqli_query($db, $query1);
$row=mysqli_fetch_array($result);
$avg=$row['Average'];
$num=$row['NumbCyl'];
$avg=$avg+$diff;
$query1 = "update ".$gas." set Average = ".$avg."where NumbCyl = ".$num.";";
mysqli_query($db, $query1) or die('Error querying database.');
/*$query2 = "create table ".$gascon." (NumbCyl int primary key auto_increment,NumberofDays int not null, DaysofDelivery int not null,Average int);";
mysqli_query($db, $query2) or die('Error querying database.');
$avg2=(int)($num1+$num2)/2;
$avg3=(int)($num1+$num2+$num3)/3;
$query3 = "INSERT INTO ".$gascon."(NumberofDays,DaysofDelivery,Average) values($num1,2,$num1),($num2,2,$avg2),($num3,2,$avg3);";
mysqli_query($db, $query3) or die('Error querying database.');
mysqli_close($db);
header("location:act.php");*/
}
?>
<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");
// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");
// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}
// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>

</body>
</html>
