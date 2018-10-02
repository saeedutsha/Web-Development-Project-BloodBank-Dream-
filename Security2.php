<?php

  session_start();
  ob_start();
  $db = mysqli_connect("localhost","root","","accounts");

  $setter = $_SESSION['username'];

  if(isset($_POST['post2'])){

    $ans1 = $_POST['ans1'];
    $ans2 = $_POST['ans2'];
    
    $sql = "SELECT * FROM securityquestions WHERE questionone = '$ans1' AND questiontwo = '$ans2'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    if(mysqli_num_rows($result) == 1){

      $_SESSION['userrecover']=$row['owneracc'];
      header('location:Recover.php');

      }
      
      else{
      $_SESSION['messageer2'] = " Invalid Answers. ";
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


  <div class="regpage">
    
    <h1 class="profile">ANSWER SECURITY QUESTIONS</h1>
    <h2 class="profile">This will help you to recover password</h2>
  

    <?php

      if(isset($_SESSION['messageer2'])){
        echo "<div class='e_message'>".$_SESSION['messageer2']."</div>";
        unset($_SESSION['messageer2']);
      }
    ?>
    
    <div class="requestborder">

    <form name="myForm" action="Security2.php" method="POST">

    <h2>Who is your favourite teacher in Childhood?<br>
    <input type="text" name="ans1" size="50px" required>
    </h2>
     
    <h2>What is your favourite holiday spot?<br>
    <input type="text" name="ans2" size="50px" required>
    </h2>

    <input type="submit" name="post2" value="SUBMIT">

    </form>
    </div>


  </div>

  </div>
  </body>
  </html>