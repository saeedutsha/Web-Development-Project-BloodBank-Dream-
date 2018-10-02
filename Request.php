<?php

  session_start();
  ob_start();
  $db = mysqli_connect("localhost","root","","accounts");

  if($_SESSION['username'] == "")
  {
    header("location: login.php");
  }

  $from = $_SESSION['username'];
  $to = $_SESSION['userinfo'];

  if(isset($_POST['sendreq'])){

    $bgroup = $_POST['bgroup'];
    $hospital = $_POST['hospital'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];
    $date = $_POST['date'];
    $message = $_POST['message'];


    $sql = "INSERT INTO req(sender,receiver,bgroup,hospital,city,contact,rdate,message) VALUES ('$from','$to','$bgroup','$hospital','$city','$contact','$date','$message')";
    mysqli_query($db,$sql);
    $_SESSION['successmessage2'] = " Request Sent Successfully. ";

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
    
    <h1 class="profile">SEND BLOOD REQUEST</h1>
    
    <?php

      if(isset($_SESSION['successmessage2'])){
        echo "<div class='r_message'>".$_SESSION['successmessage2']."</div>";
        unset($_SESSION['successmessage2']);
      }
    ?>
    
    <div class="requestborder">

    <form name="myForm" action="Request.php" method="POST">

    <h2>Blood Group<br>
    <select name="bgroup" required>
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

     
    <h2>Hospital Address<br>
    <textarea name="hospital" rows="2" cols="45" ></textarea></h2>
    
    <h2>City<br>
    <input type="text" name="city" size="50px" required>
    </h2>

    <h2>Date<br>
    <input type="date" name="date" size="50px"></h2>

    <h2>Contact Number<br>
    <input type="text" name="contact" size="50px" required>
    </h2>  

    <h2>Description<br>
    <textarea name="message" rows="3" cols="45" ></textarea></h2>

    <input type="submit" name="sendreq" value="SEND REQUEST">

    </form>
    </div>


  </div>

  </div>
  </body>
  </html>