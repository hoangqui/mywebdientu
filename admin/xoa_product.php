<?php
require("../includes/config.php");
require("../includes/session.php");
$id=$_GET['id'];
echo $id;
$sql="delete from product where ma_sp='$id'";
mysql_query($sql);
header("location:index.php?page=danhsach_product");
exit();
?>