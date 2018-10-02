<?php

	session_start();
	ob_start();
	$db = mysqli_connect("localhost","root","","accounts");

	if(isset($_POST['submit'])){

		$username = $_POST['username'];
		$password = $_POST['password'];
		$password = md5($password);
		
		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
		$result = mysqli_query($db,$sql);
		
		if(mysqli_num_rows($result) == 1){

			$_SESSION['message'] = " You are now logged in. ";
			$_SESSION['username'] = $username;

			if(isset($_POST['remember'])){
				setcookie('username',$username,time()+60*60*24*7);
				setcookie('password',$password,time()+60*60*24*7);
			}

			header('location:Profile.php');


			}
			
			else{
			$_SESSION['message2'] = " Username/Password combination is incorrect. ";
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
		
		<h1>USER LOGIN</h1>

		<?php

			if(isset($_SESSION['message2'])){
				echo "<div class='e_message'>".$_SESSION['message2']."</div>";
				unset($_SESSION['message2']);
			}
		?>


		<?php

			if(isset($_SESSION['message'])){
				echo "<div class='e_message'>".$_SESSION['message']."</div>";
				unset($_SESSION['message']);
			}
		?>

		<div class="borderlog">

		<form action="Login.php" method="POST">

		<h2>Username<br>
		<input type="text" name="username" size="50px" required>
		</h2>

		<h2>Password<br>
		<input type="password" name="password" size="50px" required>
		</h2>

		<input type="checkbox" name="remember" value="remember"> Remember Me. <br><br>

		<input type="submit" name="submit" value="LOGIN"><br>

		<a class="Forgetclick" href="Security2.php">Forgotten password?</a><br>

		<span class="Logclickp"> Don't have an account ? Click here to <a class="Logclick" href="Reg.php">Register</span>

		</form>
		</div>


</div>

</body>
</html>

<?php
	
	if(isset($_COOKIE['username']) and isset($_COOKIE['password'])){
		$username=$_COOKIE['username'];
		$password=$_COOKIE['password'];

		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
		$result = mysqli_query($db,$sql);
		
		if(mysqli_num_rows($result) == 1){

			$_SESSION['message'] = " You are now logged in. ";
			$_SESSION['username'] = $username;

			header('location:Profile.php');


			}
			
	}

?>
