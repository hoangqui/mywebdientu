<?php
require("../includes/config.php");
require("../includes/session.php");
?>
<script>
function kiemtra(){
	if(!window.confirm("Bạn có muốn xóa thành viên này hay không ?")){
		return false;
	}
}
</script>
<!-- <link href='style.css' rel='stylesheet' type='text/css' /> -->
<table class="table table-bordered" align='center'>
<tr>
	<td  colspan="5"><a href='index.php'>Home</a></td>
</tr>
<tr>
	<td class="color-td"><b>STT</b></td>
	<td class="color-td"><b>TÊN TRUY CẬP</b></td>
	<td class="color-td"><b>CẤP BẬC</b></td>
	<td class="color-td"><b>SỬA</b></td>
	<td class="color-td"><b>XÓA</b></td>
</tr>	
<?php
	$sql="select * from user order by userid DESC";
	$query=mysql_query($sql);
	if(mysql_num_rows($query) == 0){
		echo "<tr>";
		echo "<td colspan='5'>Chưa có dữ liệu</td>";
		echo "</tr>";
	}else{
		$stt=0;
		while($data=mysql_fetch_assoc($query)){
			$stt++;
			echo "<tr>";
			echo "<td>$stt</td>";
			echo "<td>$data[username]</td>";
			if($data['level'] == 1){
				echo "<td>Thành viên</td>";
			}else{
				echo "<td><font color='red'>Quản trị</font></td>";
			}
			echo "<td><a href='index.php?page=sua_user&uid=$data[userid]'>Sửa</a></td>";
			echo "<td><a href='xoa_user.php?uid=$data[userid]' onclick='return kiemtra()'>Xóa</a></td>";
		}
	}
?>
</table>