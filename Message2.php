<?php

  session_start();
  ob_start();
  $db = mysqli_connect("localhost","root","","accounts");

  if($_SESSION['username'] == "")
  {
    header("location: login.php");
  }

  $sender = $_SESSION['username'];
  

  if(isset($_POST['send'])){
    $receiver = $_SESSION['userinfo'];
    $msg = $_POST['msg'];
    $sql = "INSERT INTO messages(sender,receiver,msg,msgtime) VALUES ('$sender','$receiver','$msg',now())";
    mysqli_query($db,$sql);
    $_SESSION['successmessage'] = " Sent Successfully. ";

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

  <?php

      if(isset($_SESSION['successmessage'])){
        echo "<div class='r_message'>".$_SESSION['successmessage']."</div>";
        unset($_SESSION['successmessage']);
      }
    ?>

  <div class="messageborder">

    <form name="myForm" action="Message2.php" method="POST">

      <h2 class="messagefield">MESSAGE FIELD</h2>
      <textarea class="messagetext" name="msg" rows="5" cols="55" required ></textarea><br><br>

      <input type="submit" name="send" value="SEND">

    </form>
  </div>

  </div>
  </body>
  </html>