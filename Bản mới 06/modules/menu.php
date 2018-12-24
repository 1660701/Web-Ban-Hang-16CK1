
<div class="menu">
            <ul>
                <li><a href="index.php">Trang chủ</a> </li>
                <li><a href="index.php?xem=tatcasanpham&id=1">Tất cả sản phẩm</a> </li>
                <li><a href="index.php?xem=dangnhaptk&id=".$_SESSION["dangnhap"]>Đăng nhập</a></li>
                <li><a href="index.php?xem=dangkitk&id=1">Đăng kí</a></li>
                <li><a href="index.php?xem=thongtinnguoidung&id=1">Thông tin cá nhân</a></li>
                
                <form action="index.php" method="post" enctype="multipart/form-data">
                <div class="TimKiem">
                <input type="text" id="Ftimkiem" name="Ftimkiem" />
                <input type="submit" id="Btimkiem" name="search" value="Search" placeholder="Search..." />
                
                </div>
                </form>
                <li><a href="index.php?xem=giohang&id=1" ><input type="submit" name="giohang" id="giohang" value="giỏ hàng"  ></a></li>
            </ul>
        </div>