<?php

  session_start();
  ob_start();
  $db = mysqli_connect("localhost","root","","accounts");

  if($_SESSION['username'] == "")
  {
    header("location: login.php");
  }
  $user = $_SESSION['username'];

  $sql = "SELECT username,name,blood,address,city,mobile FROM users WHERE blood='AB-'";

  $records =mysqli_query($db,$sql);

?>


<!DOCTYPE html>
<html>
<head>
  <title>Dream</title>
  <link rel="icon" type="images/png" href="images/icon.png">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>
  $(document).ready(function(){
    $('.search').on('keyup',function(){
        var searchTerm = $(this).val().toLowerCase();
        $('#demo3 tbody tr').each(function(){
            var lineStr = $(this).text().toLowerCase();
            if(lineStr.indexOf(searchTerm) === -1){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    });
  });
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

  <div class="bloodback">

  <div class="bloodtable">

  <input type="text" name="search" class="form-control search" placeholder="Search">

    <table id="demo3" align="center">
      <caption> USER INFORMATION </caption>

    <tr>
      <th>USERNAME</th>
      <th>NAME</th>
      <th>BLOOD GROUP</th>
      <th>ADDRESS</th>
      <th>CITY</th>
      <th>CONTACT NO</th>
      <th>MESSAGE</th>
    </tr>

    <?php

    while($row=mysqli_fetch_array($records,MYSQLI_ASSOC)){

      echo "<tr>";
      $_SESSION['receiver'] = $row['username'];
      echo "<td>".$row['username']."</td>";
      echo "<td>".$row['name']."</td>";
      echo "<td>".$row['blood']."</td>";
      echo "<td>".$row['address']."</td>";
      echo "<td>".$row['city']."</td>";
      echo "<td>".$row['mobile']."</td>";
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