<!-- menu left + contant -->
        <div class="container">

            <div class="row row-offcanvas row-offcanvas-right">

                 <div class=" col-sm-3 sidebar-offcanvas" id="sidebar">
                    <div class="list-group">
                        <a href="#" class="list-group-item active"  style="text-align: center;background-color: green;"><b>Loại Chuyên Mục</b></a>
                        <?php 
                            $sql = "select * from cate";
                            $query = mysql_query($sql);
                            if (mysql_num_rows($query) == 0) {
                                echo "<a href='#'' class='list-group-item'>Dữ Liệu Rỗng</a>";
                            }else{
                                $stt= 0;
                                while ($data = mysql_fetch_assoc($query)) {
                                    $stt ++;
                                    echo "<a href='#'' class='list-group-item'><b>$data[cate_title]</b></a>";
                                }
                            }

                         ?>
                    </div>
                </div><!--/.sidebar-offcanvas-->