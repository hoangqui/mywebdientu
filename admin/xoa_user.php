<?php
require("../includes/config.php");
require("../includes/session.php");
$id=$_GET['uid'];
if($id == 1){
	echo "<script>";
	echo "alert('Khong the xoa !!!'); window.location='index.php?page=danhsach_user';</script>";
}else{
	$sql="delete from user where userid='$id'";
	mysql_query($sql);
	header("location:index.php?page=danhsach_user");
	exit();
}


?>