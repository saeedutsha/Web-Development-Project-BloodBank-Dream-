<?php

  session_start();
  ob_start();
  $db = mysqli_connect("localhost","root","","accounts");

  if($_SESSION['username'] == "")
  {
    header("location: login.php");
  }
  $user = $_SESSION['username'];

  $sql = "SELECT msg,sender,msgtime FROM messages WHERE receiver='$user' ORDER BY msgtime DESC";

  $records =mysqli_query($db,$sql);

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

  <div class="messageback">

  <div class="bloodtable">

    <table id="demo3" align="center">
      <caption style="color: white"> INBOX </caption>

    <tr>
      <th>MESSAGE</th>
      <th>FROM</th>
      <th>DATE &AMP; TIME</th>
      <th>REPLY</th>
    </tr>

    <?php

    while($row=mysqli_fetch_array($records,MYSQLI_ASSOC)){

      echo "<tr>";
      echo "<td>".$row['msg']."</td>";
      echo "<td>".$row['sender']."</td>";
      echo "<td>".$row['msgtime']."</td>";
      echo"<td><a href='Message.php'><button id='messagebutton' class='qbutton' style='vertical-align:middle'><span>CHAT</span>
    </button></a></td>";
      echo "</tr>";

    }

    ?>

  </table>

  </div>

  </div>

  </div>
  </body>
  </html>