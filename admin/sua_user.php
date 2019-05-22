<?php
require("../includes/config.php");
require("../includes/session.php");	
$id=$_GET['uid'];
if(isset($_POST['ok'])){
	$u="";
	$p="";
	if($_POST['txtuser'] == NULL){
		echo "Vui lòng nhập tên truy cập của bạn<br />";
	}else{
		$u=$_POST['txtuser'];
	}
	if($_POST['txtpass'] != $_POST['txtpass2']){
		echo "Mật khẩu và xác nhận mật khẩu không chính xác<br />";
	}else{
		if($_POST['txtpass'] != NULL){
			$p=$_POST['txtpass'];
		}else{
			$p="none";
		}
	}
	$l=$_POST['level'];
	if($u && $p && $l){
		$sql="select * from user where username='$u' and userid != '$id'";
		$query=mysql_query($sql);
		if(mysql_num_rows($query) == 1){
			echo "Tên truy cập này đã tồn tại, vui lòng chọn lại tên khác";
		}else{
			if($p != "none"){
				$sql="update user set username='$u', password='$p', level='$l' where userid='$id'";
			}else{
				$sql="update user set username='$u', level='$l' where userid='$id'";
			}
			mysql_query($sql);
			header("location:index.php?page=danhsach_user");
			exit();
		}
	}
}
$sql="select * from user where userid='$id'";
$query=mysql_query($sql);
$data=mysql_fetch_assoc($query);
?>
<!--From sua user-->
<form action="index.php?page=sua_user&uid=<?php echo $data['userid'];?>" method="post">
		<div class="form-group">
            <label class="color-td"> Cấp bậc</label>
            <select name="level" class="form-control">
            	<option value="1" <?php if($data['level'] == 1) echo "selected"; ?>>Thành viên</option>
				<option value="2" <?php if($data['level'] == 2) echo "selected"; ?>>Quản trị</option>	
			</select>
        </div>
        <div class="form-group">
            <label class="color-td">Tài khoản</label>
            <input type="text" class="form-control" placeholder="Tên truy cập" name="txtuser" value="<?php echo $data['username'];?>">
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


