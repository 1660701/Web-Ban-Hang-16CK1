<?php
//Kiểm tra "hành động" search có hay chưa để chạy lênh if else
if(isset($_POST['search'])){
    //Gán giá trị ô tìm kiếm vào 1 biến để dễ xử lí
    $search=$_POST['Ftimkiem'];
    //2 câu lệnh sql quen thuộc đã nói ở các phần trước chỉ thay đổi tên biến
    $sql="select * from sanpham where TenSP LIKE '%$search%' or Gia LIKE '%$search%'";
    $query_search=mysqli_query($conn,$sql);
}
?>
    <!-- sau khi tìm kiếm sẽ xuất ra thông tin của các sản phẩm hoặc không có sản phẩm nào được tìm thấy -->
    <p style="text-align:center;color:white;background:#4CAF50;padding:10px;">Sản phẩm tìm thấy</p>
    <div class="sanphamall">
    <?php
    //mysqli_num_rows là đếm số lần chạy, kiểm tracau lệnh sql ở trên có chạy hay chưa
    //để xuất thông tin phù hợp
    if($count=mysqli_num_rows($query_search)==0){?>
    <p>Không tìm thấy sản phẩm nào</p>
    <?php
    }else{
    ?>
    <ul>
    <?php
    //$dong này giống $row ở các phần trước nè
    while($dong_search=mysqli_fetch_array($query_search)){
    ?>
    <li><a href="index.php?xem=chitietsanpham&id=<?php echo $dong_search['MaSP'] ?>">
        <!-- Dựa vào cái $dong để xuất ra các thông tin như này đây -->
        <img src="images/san_pham/<?php echo $dong_search['HinhAnh'] ?>"width="100px" height="150px">
        <p ><?php echo $dong_search['TenSP'] ?></p>
        <del><p style="color:#F00;">Giá gốc: <?php echo $dong_search['GiaGoc'] ?></p></del>
        <p style="color:#F00;">Giá: <?php echo $dong_search['Gia'] ?></p>
        <p style="color:#4CAF50;">Chi tiết</p>
        <!-- Này là button để thêm hàng vào giỏ hàng -->
        <a href="index.php?xem=giohang&id=<?php echo $dong_search['MaSP'] ?>"><input class="buttonmuahang" type="submit" name="giohang" id="giohang" value="Mua hàng" /></a>
    </a></li>
    <?php
    }
    }
    ?>
    </ul>
</div>