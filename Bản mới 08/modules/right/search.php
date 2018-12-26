<?php
if(isset($_POST['search'])){
    $search=$_POST['Ftimkiem'];
    $sql="select * from sanpham where TenSP LIKE '%$search%' or Gia LIKE '%$search%'";
    $query_search=mysqli_query($conn,$sql);
}
?>
    <p style="text-align:center;color:white;background:#4CAF50;padding:10px;">Sản phẩm tìm thấy</p>
    <div class="sanphamall">
    <?php
    if($count=mysqli_num_rows($query_search)==0){?>
    <p>Không tìm thấy sản phẩm nào</p>
    <?php
    }else{
    ?>
    <ul>
    <?php
    while($dong_search=mysqli_fetch_array($query_search)){
    ?>
    <li><a href="index.php?xem=chitietsanpham&id=<?php echo $dong_search['MaSP'] ?>">

        <img src="images/san_pham/<?php echo $dong_search['HinhAnh'] ?>"width="100px" height="150px">
        <p><?php echo $dong_search['TenSP'] ?></p>
        <del><p style="color:#F00;">Giá gốc: <?php echo $dong_search['GiaGoc'] ?></p></del>
        <p style="color:#F00;">Giá: <?php echo $dong_search['Gia'] ?></p>
        <p style="color:#F00;">Chi tiết</p>
        <a href="index.php?xem=giohang&id=<?php echo $dong_search['MaSP'] ?>"><input class="buttonmuahang" type="submit" name="giohang" id="giohang" value="Mua hàng" /></a>
    </a></li>
    <?php
    }
    }
    ?>
    </ul>
</div>