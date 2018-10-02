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

		if($_POST['email']!=""){
			$upemail = $_POST['email'];

			$sql = "UPDATE users SET email='$upemail' where username='$user'";
			mysqli_query($db,$sql);
		}

		if($_POST['name']!=""){
			$upname = $_POST['name'];

			$sql = "UPDATE users SET name='$upname' where username='$user'";
			mysqli_query($db,$sql);
		}

		if($_POST['mobile']!=""){
			$upmobile = $_POST['mobile'];

			$sql = "UPDATE users SET mobile='$upmobile' where username='$user'";
			mysqli_query($db,$sql);
		}

		if($_POST['address']!=""){
			$upaddress = $_POST['address'];

			$sql = "UPDATE users SET address='$upaddress' where username='$user'";
			mysqli_query($db,$sql);
		}

		if($_POST['city']!=""){
			$upcity = $_POST['city'];

			$sql = "UPDATE users SET city='$upcity' where username='$user'";
			mysqli_query($db,$sql);
		}

		if($_POST['state']!=""){
			$upstate = $_POST['state'];

			$sql = "UPDATE users SET state='$upstate' where username='$user'";
			mysqli_query($db,$sql);
		}

		if($_POST['country']!=""){
			$upcountry = $_POST['country'];

			$sql = "UPDATE users SET country='$upcountry' where username='$user'";
			mysqli_query($db,$sql);
		}

		$_SESSION['message1'] = " Your update is successfull. ";
		$_SESSION['username'] = $username;

	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Dream</title>
	<link rel="icon" type="images/png" href="images/icon.png">
	<link rel="stylesheet" type="text/css" href="style.css">

	<script type="text/javascript">
			
			function validate(){
			if($_POST('email') != ""){	
			var x = document.forms["myForm"]["email"].value;
    		var atpos = x.indexOf("@");
    		var dotpos = x.lastIndexOf(".");
    				
    				if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        				alert("Not a valid e-mail address");
        				return false;
    				}
    		}		

			}


	</script>


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
		
		<h1>EDIT ACCOUNT</h1>
		<?php

			if(isset($_SESSION['message1'])){
				echo "<div class='r_message'>".$_SESSION['message1']."</div>";
				unset($_SESSION['message1']);
			}
		?>
		<br><br>

		<div class="editborder">

		<form name="myForm" action="Edit.php" onSubmit="return validate()" method="POST">

		<h2>Username<br>
		<input type="text" name="username" size="50px" placeholder="<?php echo $_SESSION['eusername']; ?>" readonly>
		</h2>

		
		<h2>Email<br>
		<input type="email" name="email" size="50px" placeholder="<?php echo $_SESSION['ok'];?>">
		</h2>

		<h2>Name<br>
		<input type="text" name="name" size="50px" placeholder="<?php echo $_SESSION['ename']; ?>">
		</h2>


		<h2>Gender<br>
		<input type="text" name="username" size="50px" placeholder="<?php echo $_SESSION['egender']; ?>" readonly>
		</h2>

		<h2>Contact Number<br>
		<input type="text" name="mobile" size="50px" placeholder="<?php echo $_SESSION['emobile']; ?>">
		</h2>

		<h2>Blood Group<br>
		<input type="text" name="username" size="50px" placeholder="<?php echo $_SESSION['eblood']; ?>" readonly>
		</h2>

		<h2>Birth Date<br>
		<input type="text" name="username" size="50px" placeholder="<?php echo $_SESSION['ebday']; ?>" readonly>
		</h2>

		<h2>Address<br>
		<textarea name="address" rows="3" cols="45" placeholder="<?php echo $_SESSION['eaddress']; ?>" ></textarea></h2>
		
		<h2>City/District<br>
		<input type="text" name="city" size="50px" placeholder="<?php echo $_SESSION['ecity']; ?>" >
		</h2>

		<h2>State/Division<br>
		<input type="text" name="state" size="50px" placeholder="<?php echo $_SESSION['estate']; ?>" ></h2>

		<h2>Country<br>
		<input type="text" name="country" size="50px" placeholder="<?php echo $_SESSION['ecountry']; ?>"></h2>

		<!-- <h2>Upload Profile Picture<span class="mustfill">*</span><br>
		<input type="file" name="pic" accept="image/*" required><br><br>
		</h2> -->

		<input type="submit" name="submit" value="CONFIRM">

		</form>
		</div>

		<br><br>

		<a href="Security.php"><button id="editbutton" class="button" style="vertical-align:middle"><span>SECURITY SETTINGS</span></button></a><br>

		<a href="Delete.php"><button id="editbutton" class="button" style="vertical-align:middle"><span>DELETE ACCOUNT</span></button></a>

	</div>

</div>

</body>
</html>