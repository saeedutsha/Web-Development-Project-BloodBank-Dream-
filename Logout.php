<?php

	session_start();
	session_destroy();

	if(isset($_COOKIE['username']) and isset($_COOKIE['password'])){
		$username=$_COOKIE['username'];
		$password=$_COOKIE['password'];
		setcookie('username',$username,time()-1);
		setcookie('password',$password,time()-1);

	}

	unset($_SESSION['username']);
	session_start();
	$_SESSION['message'] = "You are now logged out";
	header("location: Login.php");

?>