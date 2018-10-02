<?php
	$db = mysqli_connect("localhost","root","","accounts");
	$hint =$_GET['search'];
	$sql = "SELECT username FROM users WHERE username LIKE '%$hint%'";
	$records =mysqli_query($db,$sql);
	while($row=mysqli_fetch_array($records,MYSQLI_ASSOC)){
		echo $row['username']."<br>";
	}

?>