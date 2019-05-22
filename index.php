<?php 
	require('includes/config.php');
	require('template/top_index.php');
	require('template/left_index.php');
 ?>
				<div class="col-sm-9" style="background-color: white;">
                    
                    <div class="jumbotron">
                        <h1 style="color: #a78d16; text-align: center;"><b>SHOP ĐIỆN TỬ</b></h1>
                        <p style="color: green; text-align: center;"><i>Chất Lượng - Uy Tín - Hàng Đầu</i></p>
                    </div>
                    <div class="row">
                    	<?php 
                    		$sql = "select ma_sp, ten_sp, gia_sp, hinhanh_sp from product order by ma_sp DESC";
                    		$query = mysql_query($sql);
                    		while ($data = mysql_fetch_assoc($query)) {
                    			echo "<div class='col-xs-6 col-lg-4' style='border: 1px solid #eee;text-align:center;'>";
                    			if ($data['hinhanh_sp'] != null) {
                    				echo "<img src='images/$data[hinhanh_sp]' width='100px;' height = '80px;' alt='No Image'>";
                    			}
                    			echo "<h4>$data[ten_sp]</h4>";
                    			echo "<p style='color:red;'>$data[gia_sp]</p>";
                    			echo "<p><a class='btn btn-default' href='#'' role='button' style='color:#288ad6;'>View details »</a></p>";
                    			echo "</div>";
                    		}

                    	 ?>
     
                    </div><!--/row-->
                </div><!--/.col-xs-12.col-sm-9-->
 <?php 
 	require('template/footer_index.php');
  ?>