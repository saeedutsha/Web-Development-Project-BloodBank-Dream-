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
	
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$result = mysqli_query($db,$sql);
		
		if(mysqli_num_rows($result) == 1){

			$_SESSION['userinfo'] = $username;

			header('location:Info.php');

			}

	}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dream</title>
  <link rel="icon" type="images/png" href="images/icon.png">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

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
  
  <div class="groupsback">

  	 <div id="searchprofile">
  	<h3 class="Searchtext">Search For Full Profile<br>
    <form action="Blood2.php" method="POST">
  	<input type="text" name="username" id="inputuser" placeholder="Username">
  	<input id="searchsubmit" type="submit" name="submit" value="GO">
    <div id="userlist">
      
    </div>
    </form>
  	</h3>
    <script type="text/javascript">
      
      $("#inputuser").on("input",function(){
        $search = $("#inputuser").val();
        if($search.length>0){
          $.get("Search.php",{"search":$search},function($data){
            $("#userlist").html($data);
          })
        }
      });
    

    </script>

  	</div>

  <center>
  <div class="groups">

      <a href="B1.php"><button class="button" style="vertical-align:middle"><span>A+</span></button></a><br>
      <a href="B2.php"><button class="button" style="vertical-align:middle"><span>A-</span></button></a><br>
      <a href="B3.php"><button class="button" style="vertical-align:middle"><span>B+</span></button></a><br>
      <a href="B4.php"><button class="button" style="vertical-align:middle"><span>B-</span></button></a><br>
      <a href="B5.php"><button class="button" style="vertical-align:middle"><span>AB+</span></button></a><br>
      <a href="B6.php"><button class="button" style="vertical-align:middle"><span>AB-</span></button></a><br>
      <a href="B7.php"><button class="button" style="vertical-align:middle"><span>O+</span></button></a><br>
      <a href="B8.php"><button class="button" style="vertical-align:middle"><span>O-</span></button></a><br>
      <a href="B9.php"><button class="button" style="vertical-align:middle"><span>Bombay</span></button></a><br>

  </div></center>
  </div>

  </div>
  </body>
  </html>