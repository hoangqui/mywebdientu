<?php
require("../includes/session.php");
$id=$_GET['cid'];
require("../includes/config.php");
$sql="delete from cate where cate_id='$id'";
mysql_query($sql);
header("location:index.php?page=danhsach_cate");
exit();
?>