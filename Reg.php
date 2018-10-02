<?php

	session_start();
	ob_start();
	$db = mysqli_connect("localhost","root","","accounts");

	if(isset($_POST['submit'])){

		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirm = $_POST['confirm'];
		$name = $_POST['name'];
		$gender = $_POST['gender'];
		$mobile = $_POST['mobile'];
		$blood = $_POST['blood'];
		$bday = $_POST['bday'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$country = $_POST['country'];

		$csql = "SELECT * FROM users where username='$username'";
		$cresult = mysqli_query($db,$csql);

		if(mysqli_num_rows($cresult)>0){
			$_SESSION['message2'] = " Invalid Username. ";
		}
		else{

			if($password == $confirm){

			session_start();
			$password = md5($password);
			$sql = "INSERT INTO users(username,email,password,name,gender,mobile,blood,bday,address,city,state,country) VALUES ('$username','$email','$password','$name','$gender','$mobile','$blood','$bday','$address','$city','$state','$country')";
			mysqli_query($db,$sql);

			$_SESSION['message1'] = " Your registration is successfull. ";
			$_SESSION['message3'] = " Click here to log in ! ";
			$_SESSION['username'] = $username;


			}
			
			else{
			$_SESSION['message2'] = " The two passwords do not match. ";
 			}

 		}

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

			var username = document.forms["myForm"]["username"];
			var password = document.forms["myForm"]["password"];
			var confirm = document.forms["myForm"]["confirm"];
			var name = document.forms["myForm"]["name"];
			var contact = document.forms["myForm"]["contact"];
			var blood = document.forms["myForm"]["blood"];
			var city = document.forms["myForm"]["city"];
			var x = document.forms["myForm"]["email"].value;
    		var atpos = x.indexOf("@");
    		var dotpos = x.lastIndexOf(".");
    				
    				if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        				alert("Not a valid e-mail address");
        				return false;
    				}

					if(username.value()==""){
						alert("Username is required");
						username.focus();
						return false;
					}
					if(email.value()==""){
						alert("Email is required");
						email.focus();
						return false;
					}
					if(password.value()==""){
						alert("Password is required");
						password.focus();
						return false;
					}
					if(confirm.value()==""){
						alert("Again Password is required");
						confirm.focus();
						return false;
					}
					if(name.value()==""){
						alert("Name is required");
						name.focus();
						return false;
					}
					if(blood.value()==""){
						alert("Blood Group is required");
						blood.focus();
						return false;
					}
					if(city.value()==""){
						alert("City/District is required");
						city.focus();
						return false;
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
				<li><a href="Home.html">HOME</a></li>
				<li><a href="About.html">ABOUT US</a></li>
				<li><a href="Blood.html">BLOOD BANK</a></li>
				<li><a href="Contact.html">HEALTH BOOK</a></li>
				<li><a href="Reg.php">REGISTER</a></li>
				<li><a href="Login.php">LOGIN</a></li>
			</ul>
		</div>

	</div>

	<div class="regpage">
		
		<h1>USER ACCOUNT</h1>
		<h3 class="mustfill">*items must be filled</h3>

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

		<div class="border">

		<form name="myForm" action="Reg.php" onSubmit="return validate()" method="POST">

		<h2>Username<span class="mustfill">*</span><br>
		<input type="text" name="username" size="50px" required><br>
		<span class="mustfill2">[Choose Unique Username]</span>
		</h2>

		
		<h2>Email<span class="mustfill">*</span><br>
		<input type="email" name="email" size="50px" required>
		</h2>


		<h2>Password<span class="mustfill">*</span><br>
		<input type="password" name="password" size="50px" required>
		</h2>


		<h2>Confirm Password<span class="mustfill">*</span><br>
		<input type="password" name="confirm" size="50px" required>
		</h2>


		<h2>Name<span class="mustfill">*</span><br>
		<input type="text" name="name" size="50px" required>
		</h2>


		<h2>Gender<br>
		<input type="radio" name="gender" value="male" checked> Male<br>
        <input type="radio" name="gender" value="female"> Female<br>
        <input type="radio" name="gender" value="other"> Other</h2>

		<h2>Contact Number<span class="mustfill">*</span><br>
		<input type="text" name="mobile" size="50px" required>
		</h2>

		<h2>Blood Group<span class="mustfill">*</span><br>
		<select name="blood" required>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="Bombay">Bombay</option>
        </select></h2>

		<h2>Birth Date<br>
		<input type="date" name="bday" size="50px"></h2>

		<h2>Address<br>
		<textarea name="address" rows="3" cols="45" ></textarea></h2>
		
		<h2>City/District<span class="mustfill">*</span><br>
		<input type="text" name="city" size="50px" required>
		</h2>

		<h2>State/Division<br>
		<input type="text" name="state" size="50px"></h2>

		<h2>Country<br>
		<input type="text" name="country" size="50px"></h2>

		<!-- <h2>Upload Profile Picture<span class="mustfill">*</span><br>
		<input type="file" name="pic" accept="image/*" required><br><br>
		</h2> -->

		<input type="checkbox" name="accept" value="accept"> I have accepted all terms and conditions. <br><br>

		<input type="submit" name="submit" value="REGISTER">

		</form>
		</div>


	</div>

</div>

</body>
</html>