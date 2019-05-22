<?php 
	require("../includes/session.php");
	require("../includes/config.php");

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
			if ($_FILES['img']['type'] == "image/jpeg" || $_FILES['img']['type'] == "image/png") {
				move_uploaded_file($_FILES['img']['tmp_name'],"../images/".$_FILES['img']['name']);
				$img=$_FILES['img']['name'];
			}else{
				echo "Lỗi file ảnh phải ./jpg or png";
			}
		}else{
			$img="none";
		}
		$ca=$_POST['cate'];
		$ch=$_POST['check'];
		$uid=$_SESSION['ses_userid'];
		if($t && $g && $m && $img && $ca && $ch){
			if($img != "none"){
				$sql="insert into product(ten_sp,gia_sp,mota_sp,check_sp,hinhanh_sp,userid,cate_id) values('$t',$g,'$m','$ch','$img',$uid,$ca)";
			}else{
				$sql="insert into product(ten_sp,gia_sp,mota_sp,check_sp,userid,cate_id) values('$t',$g,'$m','$ch',$uid, $ca)";
		}
		mysql_query($sql);
		header("location:index.php?page=danhsach_product");
		exit();
	
	}
	}

 ?>

<!-- Form thêm sản phẩm-->
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label class="color-td">Chuyên Mục</label>
		<select name="cate" class="form-control">
			<?php 
				$sql1 = "select * from cate";
				$query = mysql_query($sql1);
				while ($data = mysql_fetch_assoc($query)) {
					echo "<option value ='$data[cate_id]'> $data[cate_title]</option>";
				}
			 ?>
		</select>
	</div>
	<div class="form-group">
		<label class="color-td">Tên Sản Phẩm</label>
		<input type="text" name="tensp" class="form-control" placeholder="Nhập tên sản phẩm">
	</div>
	<div class="form-group">
		<label class="color-td">Giá Sản Phẩm</label>
		<input type="text" name="giasp" class="form-control" placeholder="0.000 vnđ">
	</div>
	<div class="form-group">
		<label class="color-td">Mô Tả Sản Phẩm</label>
		<textarea name="motasp" id="comment" class="form-control"  rows="10" ></textarea>
	</div>
	<div class="form-group">
		<label class="color-td">Kiểm Duyệt</label>&nbsp;&nbsp;&nbsp;
		<input type="radio" name="check" value="Y" /> Đồng ý &nbsp;&nbsp;
		<input type="radio" name="check" value="N" checked="checked" /> Không đồng ý
	</div>
	<div class="form-group">
		<input type="file" name="img" size="35"></td>
	</div>	
	<button type="submit" class="btn btn-primary" name="ok">Thêm Sản Phẩm</button>
	
</form>