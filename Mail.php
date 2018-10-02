<?php

	session_start();
	ob_start();
	$db = mysqli_connect("localhost","root","","accounts");

	if($_SESSION['username'] == "")
	{
		header("location: login.php");
	}

	if(isset($_POST['submit'])){
		
		$headers =  'MIME-Version: 1.0' . "\r\n"; 
		$headers .= 'From: Dream <dreamkuetbd1234@gmail.com>' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
		mail($_SESSION['forget'],'DREAM ACCOUNT RECOVERY',"Hello ".$_SESSION['foname'].",\n\nYour username is : ".$_SESSION['username']."\nand password is : ".$_SESSION['fpassword']."\n\nThanks for being with us.",$headers);
		$_SESSION['messagefound'] = " Email sent succesfully! ";
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
				<li><a href="Home.html">HOME</a></li>
				<li><a href="About.html">ABOUT US</a></li>
				<li><a href="Blood.html">BLOOD BANK</a></li>
				<li><a href="Contact.html">HEALTH BOOK</a></li>
				<li><a href="Reg.php">REGISTER</a></li>
				<li><a href="Login.php">LOGIN</a></li>
			</ul>
		</div>

	</div>


	<div class="loginpage">
		
		<h1>RECOVERY</h1>

		<?php

			if(isset($_SESSION['messagefound'])){
				echo "<div class='r_message'>".$_SESSION['messagefound']."</div>";
				unset($_SESSION['messagefound']);
			}
		?>

		<div class="borderlog">

		<form action="Mail.php" method="POST">
		<h2>We have found your account.</h2>
		<h2>Send code via email <br></h2>
		<?php echo $_SESSION['forget']; ?><br><br>
		

		<input type="submit" name="submit" value="Send Email"><br>

		</form>
		</div>


</div>

</body>
</html>
