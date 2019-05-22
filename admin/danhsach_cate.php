<?php
require("../includes/session.php");
require("../includes/config.php");
?>
<script language="javascript">
function xacnhan(){
	if(!window.confirm('Bạn có chắc là muốn xóa chuyên mục này không ?')){
		return false;
	}
}
</script>
<table align='center' class="table table-bordered">
	<tr>
		<td  colspan="4"><a href="index.php">Home</a></td>
	</tr>
	<tr>
		<td class="color-td"><b>STT</b></td>
		<td class="color-td"><b>TÊN CHUYÊN MỤC</b></td>
		<td class="color-td"><b>SỬA</b></td>
		<td class="color-td"><b>XÓA</b></td>
	</tr>
<?php
$sql="select * from cate";
$query=mysql_query($sql);
if(mysql_num_rows($query) == 0){
	echo "<tr>";
	echo "<td colspan='4'>Empty Data</td>";
	echo "</tr>";
}else{
	$stt=0;
	while($data=mysql_fetch_assoc($query)){
		$stt++;
		echo "<tr>";
		echo "<td>$stt</td>";
		echo "<td>$data[cate_title]</td>";
		echo "<td><a href='index.php?page=sua_cate&cid=$data[cate_id]'>Sửa<a></td>";
		echo "<td><a href='xoa_cate.php?cid=$data[cate_id]' onclick='return xacnhan();'>Xóa</a></td>";
		echo "</tr>";
	}
}
?>
</table>

