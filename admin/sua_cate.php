<?php
// require("../includes/session.php");
// require("../includes/config.php");
$id=$_GET['cid'];
if(isset($_POST['ok'])){
	$t="";
	if($_POST['txttitle'] == NULL){
		echo "Vui lòng nhập tên chuyên mục của bạn <br />";
	}else{
		$t=$_POST['txttitle'];
	}
	if($t){
		$sql="update cate set cate_title='$t' where cate_id='$id'";
		mysql_query($sql);
		header("location:index.php?page=danhsach_cate");
		exit();
	}
}
$sql="select * from cate where cate_id='$id'";
$query=mysql_query($sql);
$data=mysql_fetch_assoc($query);
?>
<form action="index.php?page=sua_cate&cid=<?php echo $data['cate_id'];?>" method="post">
	<div class="form-group">
		<label class="color-td">Tên Chuyên Mục : </label>
	<input type="text" name="txttitle" class="form-control" placeholder="nhập tên chuyên mục" value="<?php echo $data['cate_title'];?>" />
	</div>
<button type="submit" class="btn btn-primary" name="ok">Thêm chuyên mục</button>
</form>
