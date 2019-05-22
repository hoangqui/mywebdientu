<?php
require("../includes/config.php");
require ("../includes/session.php");

include_once("menu_top.php");
// menu trai
include_once("menu_left.php");

  ?>
<!--content-->
    <div id="content" class="col-sm-10">

     	<?php 
     		if(isset($_GET['page'])){
     			if($_GET['page'] == "danhsach_user")
     				include("danhsach_user.php");
     			if($_GET['page'] == "sua_user")
     				include("sua_user.php");
                if($_GET['page'] == "them_user")
                    include("them_user.php");

                if($_GET['page'] == "them_cate")
                    include("them_cate.php");
                if($_GET['page'] == "danhsach_cate")
                    include("danhsach_cate.php");
                if($_GET['page'] == "sua_cate")
                    include("sua_cate.php");
                if($_GET['page'] == "them_product")
                    include("them_product.php");
                if($_GET['page'] == "danhsach_product")
                    include("danhsach_product.php");
                if($_GET['page'] == "xoa_product")
                    include("xoa_product.php");
                if($_GET['page'] == "sua_product")
                    include("sua_product.php");
     		}else{
                include("danhsach_user.php");
            }

     	 ?>
    </div>

<?php
	include_once("footer.php");
?>
