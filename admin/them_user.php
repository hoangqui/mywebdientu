<?php
// require("../includes/session.php");
// require("../includes/config.php");
if(isset($_POST['ok'])){
	$u="";
	$p="";
	if($_POST['txtuser'] == NULL){
		echo "Vui lòng nhập tên truy cập của bạn <br />";
	}else{
		$u=$_POST['txtuser'];
	}
	if($_POST['txtpass'] == NULL){
		echo "Vui lòng nhập mật khẩu của bạn <br />";
	}else{
		if($_POST['txtpass'] != $_POST['txtpass2']){
			echo "Mật khẩu và xác nhận mật khẩu không chính xác";
		}else{
			$p=$_POST['txtpass'];
		}
	}
	$l=$_POST['level'];
	if($u && $p && $l){

		$sql="select * from user where username='$u'";
		$query=mysql_query($sql);
		if(mysql_num_rows($query) == 1){
			echo "Tên truy cập này đã tồn tại. Vui lòng chọn tên khác.";
		}else{
			$sql="insert into user(username,password,level) values('$u','$p','$l')";
			mysql_query($sql);
			header("location:index.php?page=danhsach_user");
			exit();
		}
	}
}
?>
<form action="" method="post">
<!-- Cấp bậc: <select name="level">
	<option value="1">Thành viên</option>
	<option value="2">Quản trị</option>	
	</select><br />
Tên truy cập: <input type="text" name="txtuser" size="25" /> <br />
Mật khẩu: <input type="password" name="txtpass" size="25" /><br />
Xác nhận mật khẩu: <input type="password" name="txtpass2" size="25" /><br />
<input type="submit" name="ok" value="Submit" /> -->
		<div class="form-group">
            <label class="color-td">Cấp bậc</label>
            <select name="level" class="form-control">
            	<option value="1" >Thành viên</option>
				<option value="2" >Quản trị</option>	
			</select>
        </div>
        <div class="form-group">
            <label class="color-td">Tài khoản</label>
            <input type="text" class="form-control" placeholder="Tên truy cập" name="txtuser" >
        </div>
        <div class="form-group">
            <label class="color-td">Mật Khẩu</label>
            <input type="password" class="form-control" placeholder="Mật khẩu" name="txtpass">
        </div>
        <div class="form-group">
            <label class="color-td">Xác Nhận Mật Khẩu</label>
            <input type="password" class="form-control" placeholder="Xác nhận mật khẩu" name="txtpass2">
        </div>
        <button type="submit" class="btn btn-primary" name="ok">Cập nhật thông tin</button>
</form>