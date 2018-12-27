<!-- Xuất hiện ra phần danh sách các loại SP từ CSDL-->
                <p style="text-align:center;color:white;background:#4CAF50;padding:10px">Danh sách loại sản phẩm</p>
                <div class="danhsachsp">
                    <ul>
                    <?php
                        $sql="select ID, Ten from danhmuc";
                        //$run là chạy CSDL và giữ CSDL để gán vào nó
                        $run=mysqli_query($conn,$sql);
                        //$row lấy 1 dòng csdl từ tất cả csdl chứa trong $run
                        while ($row = mysqli_fetch_array($run)) {
                            //dấu (.) trong đây có nghĩa là nối chuỗi, vì nếu bỏ (.) nó sẽ không hiểu và chạy sai
                                echo "<li><a href=\"index.php?xem=sanphamcungloai&id=".$row['ID']."\">".$row['Ten']."</a></li>";
                        }

                    ?>
<!-- Xuất hiện ra phần danh sách các Nhà sản xuất từ CSDL-->
                    </ul>
                        <p style="text-align:center;color:white;background:#4CAF50;padding:10px">Danh sách nhà sản xuất</p>
                    <ul>
                    <ul>
                    <?php
                    //Tương tụ như phần ở trên
                        $sql="select ID, Ten from nhasanxuat";
                        $run=mysqli_query($conn,$sql);

                        while ($row = mysqli_fetch_array($run)) {
                                echo "<li><a href=\"index.php?xem=sanphamcungnsx&id=".$row['ID']."\">".$row['Ten']."</a></li>";
                        }

                    ?>
                    </ul>
                </div>