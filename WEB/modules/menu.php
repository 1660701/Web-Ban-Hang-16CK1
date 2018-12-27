
<div class="menu">
            <ul>
            
                <li><a href="index.php">Trang chủ</a> </li>
                <li><a href="index.php?xem=tatcasanpham&id=1">Tất cả sản phẩm</a> </li>
                
                <li><a href="index.php?xem=dangnhaptk&id=>">Đăng nhập</a></li>
                <li><a href="index.php?xem=dangkitk&id=1">Đăng kí</a></li>
                <li><a href="index.php?xem=thongtinnguoidung&id=<?php echo @$_SESSION['dangnhap']?>&x0y1z2">Thông tin cá nhân</a></li>
                <form action="index.php" method="post" enctype="multipart/form-data">
                <div class="TimKiem">
                <input type="text" id="Ftimkiem" name="Ftimkiem" />
                <input class="search" type="submit" id="Btimkiem" name="search" value="Search" placeholder="Search..." />
                
                </div>
                </form>
                <?php
                $count=0;
                $count= $_SESSION["soluong"];
                ?>
                <li> <span class="cart" > <a href="index.php?xem=giohang&id=1">&#40;<?php echo $count ?>&#41;items &#124;Giỏ hàng</a></li></span>

               

            </ul>
        </div>
<?php
    
    if(isset($_GET['xem'])&&$_GET['xem']=='logout')
    {
        unset($_SESSION['dangnhap']);
        header('location:index.php');
    }
?>