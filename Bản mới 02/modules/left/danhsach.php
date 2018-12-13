
                <p style="text-align:center;color:red;background:#0CF;padding:10px">Danh sách loại sản phẩm</p>
                <div class="danhsachsp">
                    <ul>
                    <?php
                        $sql="select ID, Ten from danhmuc";
                        $run=mysqli_query($conn,$sql);
                       // $dong=mysqli_fetch_array($run);

                        while ($row = mysqli_fetch_array($run)) {
                                echo "<li><a href=\"index.php?xem=sanphamcungloai&id=".$row['ID']."\">".$row['Ten']."</a></li>";
                        }

                    ?>
                    </ul>
                        <p style="text-align:center;color:red;background:#0CF;padding:10px">Danh sách nhà sản xuất</p>
                    <ul>
                        <li><a href="#">YAME</a></li>
                        <li><a href="#">WREALM</a></li>
                        <li><a href="#">Routine</a></li>
                        <li><a href="#">PU</a></li>
                    </ul>
                </div>