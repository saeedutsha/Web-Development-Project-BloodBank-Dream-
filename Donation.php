<?php

  session_start();
  ob_start();
  $db = mysqli_connect("localhost","root","","accounts");

  if($_SESSION['username'] == "")
  {
    header("location: login.php");
  }

  $doner = $_SESSION['username'];

  if(isset($_POST['add'])){

    $ddate = $_POST['date'];
    $hospital = $_POST['hospital'];
    $city = $_POST['city'];

    $sql = "INSERT INTO bdnt(dner,ddte,dhsptl,dcty) VALUES ('$doner','$ddate','$hospital','$city')";
    mysqli_query($db,$sql);
    $_SESSION['successmessage3'] = " Added Successfully. ";

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
    
    <h1 class="profile">ADD DONATION HISTORY</h1>
    
    <?php

      if(isset($_SESSION['successmessage3'])){
        echo "<div class='r_message'>".$_SESSION['successmessage3']."</div>";
        unset($_SESSION['successmessage3']);
      }
    ?>
    
    <div class="requestborder">

    <form name="myForm" action="Donation.php" method="POST">

    <h2>Date<br>
    <input type="date" name="date" size="50px" required></h2>
     
    <h2>Hospital Address<br>
    <textarea name="hospital" rows="2" cols="45" required></textarea></h2>
    
    <h2>City<br>
    <input type="text" name="city" size="50px" required>
    </h2>

    <input type="submit" name="add" value="ADD">

    </form>
    </div>


  </div>

  </div>
  </body>
  </html>