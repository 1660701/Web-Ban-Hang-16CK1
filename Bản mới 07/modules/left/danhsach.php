
                <p style="text-align:center;color:white;background:#4CAF50;padding:10px">Danh sách loại sản phẩm</p>
                <div class="danhsachsp">
                    <ul>
                    <?php
                        $sql="select ID, Ten from danhmuc";
                        $run=mysqli_query($conn,$sql);

                        while ($row = mysqli_fetch_array($run)) {
                                echo "<li><a href=\"index.php?xem=sanphamcungloai&id=".$row['ID']."\">".$row['Ten']."</a></li>";
                        }

                    ?>
                    </ul>
                        <p style="text-align:center;color:white;background:#4CAF50;padding:10px">Danh sách nhà sản xuất</p>
                    <ul>
                    <ul>
                    <?php
                        $sql="select ID, Ten from nhasanxuat";
                        $run=mysqli_query($conn,$sql);

                        while ($row = mysqli_fetch_array($run)) {
                                echo "<li><a href=\"index.php?xem=sanphamcungnsx&id=".$row['ID']."\">".$row['Ten']."</a></li>";
                        }

                    ?>
                    </ul>
                </div>