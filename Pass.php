<?php

	session_start();
	ob_start();
	$db = mysqli_connect("localhost","root","","accounts");

	if($_SESSION['username'] == "")
	{
		header("location: login.php");
	}

	if(isset($_POST['submit'])){

		$user = $_SESSION['username'];
		$newpassword = $_POST['newpassword'];
		$confirm = $_POST['confirm'];
		$password = $_POST['password'];
		$password = md5($password);
		$password2 = $_SESSION['epassword'];

		if($password==$password2){
			if($newpassword == $confirm){
				$newpassword = md5($newpassword);
				$sql = "UPDATE users SET password='$newpassword' where username='$user'";
				mysqli_query($db,$sql);
				$_SESSION['message1'] = " Your update is successfull. ";
				$_SESSION['message3'] = " Click here to log in ! ";

			}
			else{
			$_SESSION['message2'] = " The two passwords do not match. ";
 			} 
		}
		else{
			$_SESSION['message2'] = " Incorrect Old Password. ";
 			} 
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
		
		<h1>CHANGE PASSWORD</h1>
		<?php

			if(isset($_SESSION['message1'])){
				echo "<div class='r_message'>".$_SESSION['message1']."</div>";
				echo "<center>"."<a class='click' href='Login.php'>".$_SESSION['message3']."</a>"."</center";
				unset($_SESSION['message1']);
				unset($_SESSION['message3']);
			}
		?>

		<?php

			if(isset($_SESSION['message2'])){
				echo "<div class='e_message'>".$_SESSION['message2']."</div>";
				unset($_SESSION['message2']);
			}
		?>

		<br><br>

		<div class="editborder">

		<form name="myForm" action="Pass.php" method="POST">

		<h2>Old Password<span class="mustfill">*</span><br>
		<input type="password" name="password" size="50px" required>
		</h2>

		<h2>New Password<span class="mustfill">*</span><br>
		<input type="password" name="newpassword" size="50px" required>
		</h2>

		<h2>Confirm Password<span class="mustfill">*</span><br>
		<input type="password" name="confirm" size="50px" required>
		</h2>

		<input type="submit" name="submit" value="CONFIRM">

		</form>
		</div>

	</div>

</div>

</body>
</html>