<style type="text/css">
	img{
		width: 70px;
		height: 50px;
	}
</style>
<?php
	$B=3;
	if (isset($_GET['cid'])) {
		$C = $_GET['cid'];
	}else{
		$sql = "select * from product";
		$query = mysql_query($sql);
		$A = mysql_num_rows($query);
		$C = ceil($A/$B);
	}
	
	if (isset($_GET['start'])) {
		$X = $_GET['start'];
	}else{
		$X = 0;
	}
	
	$sql = "select * from product limit $X, $B";
	$result = mysql_query($sql);
?>
<table class="table table-bordered" align='center'>
<tr>
	<td  colspan="6"><a href='index.php'>Home</a></td>
</tr>
<tr>
	<td class="color-td"><b>STT</b></td>
	<td class="color-td"><b>HÌNH ẢNH</b></td>
	<td class="color-td"><b>TÊN SẢN PHẨM</b></td>
	<td class="color-td"><b>GIÁ SẢN PHẨM</b></td>
	<td class="color-td"><b>KIỂM TRA</b></td>
	<td class="color-td"><b>SỬA</b></td>
	<td class="color-td"><b>XÓA</b></td>
</tr>
<?php
	if(mysql_num_rows($result)>0){
		$stt=0;
		while($data=mysql_fetch_assoc($result)){
			$stt++;
			echo "<tr>";
			echo "<td>$stt</td>";
			echo "<td><img src='../images/$data[hinhanh_sp]'></td>";
			echo "<td>$data[ten_sp]</td>";
			echo "<td>$data[gia_sp]</td>";
			if ($data['check_sp'] == "Y") {
				echo "<td>Đã Duyệt</td>";
			}else{
				echo "<td><font color='red'>Chưa Duyệt</font></td>";
			}
			
			echo "<td><a href='index.php?page=sua_product&id=$data[ma_sp]'>Sửa</a></td>";
			echo "<td><a href='index.php?page=xoa_product&id=$data[ma_sp]' onclick='return kiemtra()'>Xóa</a></td>";
	}
	}else{
		echo "<tr>";
		echo "<td colspan='5'>Chưa có dữ liệu</td>";
		echo "</tr>";
	}
 ?> 
</table>
 <script>
function kiemtra(){
	if(!window.confirm("Bạn có muốn xóa sản phẩm này hay không ?")){
		return false;
	}
}
</script>
 <!-- Code phân trang -->
 <div align="center">
 	<ul class="pagination">
 	<?php 
 		if ($C > 1) {
 			$D = $X/$B + 1;
 			if ($D != 1) {
 				$Y = $X - $B;
 				echo "<li><a href ='index.php?page=danhsach_product&start=$Y&cid=$C'>Previous</a></li>";
 			}
 			// code xu ly khi so trang qua lon
 			$begin = $D -2;
 			if ($begin < 1) {
 				$begin = 1;
 			}
 			$end = $D + 2;
 			if ($end > $C) {
 				$end = $C;
 			}
 			for ($i=$begin; $i <= $end ; $i++) { 
 				if ($D == $i) {
 					echo "<li><a href ='' style='background-color:#FFD100;'>$i</a></li>";
 				}else{
 					$Y = ($i - 1) * $B;
 					echo "<li><a href ='index.php?page=danhsach_product&start=$Y&cid=$C'>$i</a></li>";
 				}
 			}
 			if ($D != $C) {
 				$Y = $X + $B;
 				echo "<li><a href ='index.php?page=danhsach_product&start=$Y&cid=$C'>Next</li></a>";
 			}
 		}
 	 ?>
 	</ul>
 </div>
 