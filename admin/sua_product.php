<style type="text/css">
	img{
		width: 100px;
		height: 100px;
	}
</style>
<?php 
	require("../includes/session.php");
	require("../includes/config.php");
	$id = $_GET['id'];
	if (isset($_POST['ok'])) {
		$t ="";
		$g ="";
		$m ="";
		$img ="";
		if($_POST['tensp'] == NULL){
			echo "Vui lòng nhập tên sản phẩm<br />";
		}else{
			$t=$_POST['tensp'];
		}
		if($_POST['giasp'] == NULL){
			echo "Vui lòng nhập giá sản phẩm <br />";
		}else{
			$g=$_POST['giasp'];
		}
		if($_POST['motasp'] == NULL){
			echo "Vui lòng nhập mô tả sản phẩm<br />";
		}else{
			$m=$_POST['motasp'];
		}
		if($_FILES['img']['name'] != NULL){
			move_uploaded_file($_FILES['img']['tmp_name'],"../images/".$_FILES['img']['name']);
			$img=$_FILES['img']['name'];
		}else{
			$img="none";
		}
		$ca=$_POST['cate'];
		$ch=$_POST['check'];
		$uid=$_SESSION['ses_userid'];
		if($t && $g && $m && $img && $ca && $ch){
			if($img != "none"){
				$sql="update product set ten_sp='$t',gia_sp=$g,mota_sp='$m',check_sp='$ch',hinhanh_sp='$img',userid=$id,cate_id= $ca where ma_sp=$id";
			}else{
				$sql="update product set ten_sp='$t',gia_sp=$g,mota_sp='$m',check_sp='$ch',userid=$id,cate_id= $ca where ma_sp=$id";
		}
		mysql_query($sql);
		header("location:index.php?page=danhsach_product");
		exit();
	
	}
	}

 ?>
 <?php 
		$sql="select * from product where ma_sp='$id'";
		$query=mysql_query($sql);
		$data=mysql_fetch_assoc($query);
 ?>


<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label class="color-td">Chuyên Mục</label>
		<select name="cate" class="form-control">
			<?php 
				$sql1 = "select * from cate";
				$query = mysql_query($sql1);
				while ($data2 = mysql_fetch_assoc($query)) {
					if ($data['cate_id'] == $data2['cate_id']) {
						echo "<option value ='$data2[cate_id]' selected='selected'> $data2[cate_title]</option>";
					}else{
						echo "<option value ='$data2[cate_id]' > $data2[cate_title]</option>";
					}
					
				}
			 ?>
		</select>
	</div>
	<div class="form-group">
		<label class="color-td">Tên Sản Phẩm</label>
		<input type="text" name="tensp" class="form-control" value="<?=$data['ten_sp'];?>">
	</div>
	<div class="form-group">
		<label class="color-td">Giá Sản Phẩm</label>
		<input type="text" name="giasp" class="form-control" value="<?=$data['gia_sp'];?>">
	</div>
	<div class="form-group">
		<label class="color-td">Mô Tả Sản Phẩm</label>
		<textarea name="motasp" id="comment" class="form-control"  rows="10"><?=$data['ten_sp'];?></textarea>
	</div>
	<div class="form-group">
		<label class="color-td">Kiểm Duyệt</label>&nbsp;&nbsp;&nbsp;
		<input type="radio" name="check" value="Y" <?php if($data['check_sp'] == "Y") echo "checked='checked'";?> /> Đồng ý &nbsp;&nbsp;
		<input type="radio" name="check" value="N" <?php if($data['check_sp'] == "N") echo "checked='checked'";?> /> Không đồng ý
	</div>
	<div class="form-group">
		<label class="color-td">Hinh ảnh hiện có</label>
		<img src='../images/<?=$data['hinhanh_sp'];?>'>
	</div>
	<div class="form-group">
		<input type="file" name="img" size="35"></td>
	</div>	
	<button type="submit" class="btn btn-primary" name="ok">Sửa Sản Phẩm</button>
	
</form>
