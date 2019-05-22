<?php
require("../includes/session.php");
require("../includes/config.php");
if(isset($_POST['ok'])){
	$c= "";
	if($_POST['txtcate'] == NULL){
		echo "Vui lòng nhập tên chuyên mục";
	}else{
		$c=$_POST['txtcate'];
	}
	if($c){

		$sql="insert into cate(cate_title) values('$c')";
		if(mysql_query($sql) == true){
			echo "<script>alert('Thêm thành công');</script>";
		}
		//sleep(2);
		header("location:index.php?page=danhsach_cate");
		exit();
	}
}
?>
<form action="" method="post">
<div class="form-group">
	<label class="color-td">Tên Chuyên Mục : </label>
	<input type="text" name="txtcate" class="form-control" placeholder="Nhập tên chuyên mục" />
</div>
<button type="submit" class="btn btn-primary" name="ok">Thêm chuyên mục</button>
</form>