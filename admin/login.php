<?php
session_start();
$u = "";
$p = "";
if(isset($_POST['ok'])){
	if($_POST['txtuser'] == NULL){
		echo "<script>alert('Vui lòng nhập tên truy cập')</script><br />";
	}else{
		$u=$_POST['txtuser'];
	}
	if($_POST['txtpass'] == NULL){
		echo "<script>alert('Vui lòng nhập mật khẩu')</script><br />";
	}else{
		$p=$_POST['txtpass'];
	}
	if($u && $p){
		require("../includes/config.php");
		$sql="select * from user where username='$u' and password='$p'";
		$query=mysql_query($sql);
		if(mysql_num_rows($query) == 0){
			echo "<script>alert('Tài khoản và mật khẩu không chính xác . Vui lòng nhập lại !')</script><";
		}else{
			$data=mysql_fetch_assoc($query);
			$_SESSION['ses_username']=$data['username'];
			$_SESSION['ses_level']=$data['level'];
			$_SESSION['ses_userid']=$data['userid'];
			header("location:index.php");
			exit();
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Demo Bostrap</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>
	 <div class="container">
		<div class="login" style="width: 300px; height: 300px; margin-left: 400px; margin-top: 100px;">
	      <form class="form-signin" role="form" action="login.php" method="post">
	        <h2 class="form-signin-heading" style="text-align: center;"> Đăng Nhập </h2>
	        <input type="text" name="txtuser"  class="form-control" placeholder="Tên đăng nhập" required autofocus>
	        <input type="Password" name="txtpass" class="form-control" placeholder="Mật khẩu" required>
	        <!--<label class="checkbox">
	          <input type="checkbox" value="remember-me"> Nhớ mật khẩu
	        </label>-->
	        <label class="checkbox">
	        	<a href="#"><p style="text-align: right;">Quên mật khẩu ?</p></a>
	        </label>
	        <button class="btn btn-lg btn-primary btn-block" type="submit" name="ok">Sign in</button> 
	        <!-- <input type="submit" name="ok" value="Đăng Nhập"> -->
	      </form>
		</div>
    </div>
</body>
</html>