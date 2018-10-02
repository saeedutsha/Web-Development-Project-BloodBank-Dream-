<?php

  session_start();
  ob_start();
  $db = mysqli_connect("localhost","root","","accounts");

  if($_SESSION['username'] == "")
  {
    header("location: login.php");
  }

  $setter = $_SESSION['username'];

  if(isset($_POST['post'])){

    $ans1 = $_POST['ans1'];
    $ans2 = $_POST['ans2'];

    $sql = "INSERT INTO securityquestions(owneracc,questionone,questiontwo) VALUES ('$setter','$ans1','$ans2')";
    mysqli_query($db,$sql);
    $_SESSION['successmessage4'] = " Submitted Successfully. ";

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
    
    <h1 class="profile">ANSWER SECURITY QUESTIONS</h1>
    <h2 class="profile">This will help you to recover password</h2>
    
    <?php

      if(isset($_SESSION['successmessage4'])){
        echo "<div class='r_message'>".$_SESSION['successmessage4']."</div>";
        unset($_SESSION['successmessage4']);
      }
    ?>
    
    <div class="requestborder">

    <form name="myForm" action="Security.php" method="POST">

    <h2>Who is your favourite teacher in Childhood?<br>
    <input type="text" name="ans1" size="50px" required>
    </h2>
     
    <h2>What is your favourite holiday spot?<br>
    <input type="text" name="ans2" size="50px" required>
    </h2>

    <input type="submit" name="post" value="SUBMIT">

    </form>
    </div>


  </div>

  </div>
  </body>
  </html>