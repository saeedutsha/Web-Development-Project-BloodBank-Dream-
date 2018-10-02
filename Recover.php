<?php

  session_start();
  ob_start();
  $db = mysqli_connect("localhost","root","","accounts");

  $username = $_SESSION['userrecover'];


  $sql = "SELECT confirm FROM users WHERE username='$username'";
  $query =mysqli_query($db,$sql);
  $row = mysqli_fetch_array($query,MYSQLI_ASSOC);

  $pass=$row['confirm'];

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


  <div class="regpage">
    
    <h1 class="profile">CONGRATULATIONS!</h1>
    
    <div class="requestborder">

    <h2>Hello <?php echo $username; ?>,<br> Your Password is <?php echo $pass; ?> </h2>
    <h3>Thanks for being with us. - Dream Team</h3>

    </div>


  </div>

  </div>
  </body>
  </html>