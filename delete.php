<?php

	session_start();
	ob_start();
	$db = mysqli_connect("localhost","root","","accounts");
	if($_SESSION['username'] == "")
	{
		header("location: login.php");
	}
	$user = $_SESSION['username'];

	if(isset($_POST['submityes'])){
		$sql = "DELETE FROM users WHERE username='$user'";
		$sql2 = "DELETE FROM bdnt WHERE dner='$user'";
		$sql3 = "DELETE FROM messages WHERE receiver='$user'";
		$sql4 = "DELETE FROM req WHERE sender='$user'";
		$sql5 = "DELETE FROM securityquestions WHERE owneracc='$user'";
		mysqli_query($db,$sql);
		mysqli_query($db,$sql2);
		mysqli_query($db,$sql3);
		mysqli_query($db,$sql4);
		mysqli_query($db,$sql5);
		header("location:Home.html");
	}

	else if(isset($_POST['submitno'])){
		header("location:Profile.php");
	}


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

	<div class="regpage">
		
		<h1>DELETE ACCOUNT</h1>

		<div class="editborder">

		<form name="myForm" action="Delete.php" method="POST">

		<h2>ARE YOU SURE TO DELETE YOUR ACCOUNT ? </h2>

		<input type="submit" name="submityes" value="YES">
		<input id="subno" type="submit" name="submitno" value="NO">

		</form>
		</div>

		<br><br>

	</div>

</div>

</body>
</html>