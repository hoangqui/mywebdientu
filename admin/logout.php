<?php 
// Code thoát khỏi SESSION
	session_start();
	session_destroy();
	header("location: login.php");
	exit();
 ?>