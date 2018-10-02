<?php

	session_start();
	ob_start();
	$db = mysqli_connect("localhost","root","","accounts");

	if($_SESSION['username'] == "")
	{
		header("location: login.php");
	}
	$user = $_SESSION['username'];

	$sql = "SELECT * FROM users WHERE username='$user'";

	$query =mysqli_query($db,$sql);

	$row = mysqli_fetch_array($query,MYSQLI_ASSOC);

	$_SESSION['eusername'] = $row['username'];
	$_SESSION['ok'] = $row['email'];
	$_SESSION['epassword'] = $row['password'];
	$_SESSION['ename'] = $row['name'];
	$_SESSION['egender'] = $row['gender'];
	$_SESSION['emobile'] = $row['mobile'];
	$_SESSION['eblood'] = $row['blood'];
	$_SESSION['ebday'] = $row['bday'];
	$_SESSION['eaddress'] = $row['address'];
	$_SESSION['ecity'] = $row['city'];
	$_SESSION['estate'] = $row['state'];
	$_SESSION['ecountry'] = $row['country'];

?>




<!DOCTYPE html>
<html>

<head>
	<title>Dream</title>
	<link rel="icon" type="images/png" href="images/icon.png">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>

	<div class="mainpage">

	<div class="header">
		
		<div class="logo">
			<img src="images/dream.jpg" />
		</div>

		<div class="menu">		
			<ul>
				<li><a href="Home2.html">HOME</a></li>
				<li><a href="About2.html">ABOUT US</a></li>
				<li><a href="Blood2.php">BLOOD BANK</a></li>
				<li><a href="Contact2.html">HEALTH BOOK</a></li>
				<li><a href="Profile.php">PROFILE</a></li>
				<li><a href="Logout.php">LOGOUT</a></li>
			</ul>
		</div>

	</div>

	<div class="profile">
	<center><h1><marquee>Profile Information</marquee></h1></center>
	</div>

	<div class="table">

		<table align="center">
      <caption> </caption>
	
	<tr>
	
	<th colspan="2">USERNAME: </th>
	<?php echo "<td colspan='4'>".$row['username']."</td>" ?>
	
	</tr>
	
	<tr>
	
	<th colspan="2">EMAIL: </th>
	<?php echo "<td colspan='4'>".$row['email']."</td>" ?>
	
	</tr>
	
	<tr>
	
	<th colspan="2">NAME: </th>
	<?php echo "<td colspan='4'>".$row['name']."</td>" ?>
	
	</tr>
	
	<tr>
	
	<th colspan="2">GENDER: </th>
	<?php echo "<td colspan='4'>".$row['gender']."</td>" ?>
	
	</tr>
	
	
	<tr>
	
	<th colspan="2">MOBILE NUMBER: </th>
	<?php echo "<td colspan='4'>".$row['mobile']."</td>" ?>	
	</tr>
	
	
	
	<tr>
	
	<th colspan="2">BLOOD GROUP: </th>
	<?php echo "<td colspan='4'>".$row['blood']."</td>" ?>
	
	</tr>
	
	<tr>
	
	<th colspan="2">DATE OF BIRTH: </th>
	<?php echo "<td colspan='4'>".$row['bday']."</td>" ?>
	
	</tr>
	
	<tr>
	
	<th colspan="2">ADDRESS: </th>
	<?php echo "<td colspan='4'>".$row['address']."</td>" ?>
	
	</tr>
	
	
	<tr>
	
	<th colspan="2">CITY/DISTRICT: </th>
	<?php echo "<td colspan='4'>".$row['city']."</td>" ?>
	
	</tr>
	
	<tr>
	
	<th colspan="2">STATE/DIVISION: </th>
	<?php echo "<td colspan='4'>".$row['state']."</td>" ?>

	</tr>

	<tr>
	
	<th colspan="2">COUNTRY: </th>
	<?php echo "<td colspan='4'>".$row['country']."</td>" ?>
	
	</tr>
	
	</table><br> 

	</div><br>

	<div class="info">
		<center><td><a href="Inbox.php"><button id="message2button" class="qbutton" style="vertical-align:middle"><span>INBOX</span></button></a></td></center>

		<center><td><a href="Reqin.php"><button id="message2button" class="qbutton" style="vertical-align:middle"><span>BLOOD REQUESTS</span></button></a></td></center>

		<center><td><a href="Edit.php"><button id="editbutton" class="button" style="vertical-align:middle"><span>EDIT PROFILE</span></button></a></td></center>

		<center><td><a href="Pass.php"><button id="editbutton" class="button" style="vertical-align:middle"><span>CHANGE PASSWORD</span></button></a></td></center>

		<center><td><a href="History.php"><button id="editbutton" class="button" style="vertical-align:middle"><span>DONATION HISTORY</span></button></a></td></center>

		<center>
		<h2 class="buttonexplain">Check the Eligibility of Blood Donation:</h2>
		<a href="Quizframe.html"><button class="button" style="vertical-align:middle"><span>Eligibility Quiz</span>
		</button></a>
		</center>

	</div>	

	</div>
</body>

</html>