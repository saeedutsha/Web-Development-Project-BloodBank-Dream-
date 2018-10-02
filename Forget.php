<?php

	session_start();
	ob_start();
	$db = mysqli_connect("localhost","root","","accounts");

	if($_SESSION['username'] == "")
	{
		header("location: login.php");
	}

	if(isset($_POST['submit'])){

		$username = $_POST['username'];
		
		$sql = "SELECT name,email,password FROM users WHERE username = '$username'";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		if(mysqli_num_rows($result) == 1){
			$_SESSION['foname'] = $row['name'];
			$_SESSION['forget'] = $row['email'];
			$_SESSION['fpassword'] = md5($row['password']);

			header('location:Mail.php');
			}
			else{
			$_SESSION['messagenotfound'] = " Username not found! ";
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

			if(isset($_SESSION['messagenotfound'])){
				echo "<div class='e_message'>".$_SESSION['messagenotfound']."</div>";
				unset($_SESSION['messagenotfound']);
			}
		?>

		<div class="borderlog">

		<form action="Forget.php" method="POST">

		<h3>Please enter your username <br>
		<input type="text" name="username" size="50px" required>
		</h3>

		<input type="submit" name="submit" value="SEARCH"><br>

		</form>
		</div>


</div>

</body>
</html>
