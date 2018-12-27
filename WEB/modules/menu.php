
<div class="menu">
            <ul>
                <!-- tạo ra các đường link dẫn đến các chức năng của trang web -->
                <li><a href="index.php">Trang chủ</a> </li>
                <!-- chuẩn bị đường link, chú ý tới phần "xem=", giá trị sau xem= là gì 
                                                    thì phần content sẽ kiểm tra và xử lí-->
                <li><a href="index.php?xem=tatcasanpham&id=1">Tất cả sản phẩm</a> </li>
                <!-- echo @$_SESSION là xuất ra giá trị của nó -->
                <li><a href="index.php?xem=giohang&id=<?php echo @$_SESSION['dangnhap']?>">Giỏ hàng</a></li>
                <li><a href="index.php?xem=dangnhaptk&id=>">Đăng nhập</a></li>
                <li><a href="index.php?xem=dangkitk&id=1">Đăng kí</a></li>
                <!-- ..>?&x0y1z2 là thêm vào để tạo cảm giác khó nhìn, vì chỉ cần sửa tên là hack được :v -->
                <li><a href="index.php?xem=thongtinnguoidung&id=<?php echo @$_SESSION['dangnhap']?>&x0y1z2">Thông tin cá nhân</a></li>
                <!-- Đây là form tìm kiếm -->
                <form action="index.php" method="post" enctype="multipart/form-data">
                <div class="TimKiem">
                <input type="text" id="Ftimkiem" name="Ftimkiem" />
                <!-- hãy quan tâm đến name của cả button và name của khung tìm kiếm
                    Vì giá trị ở đây sẽ được lấy đi và xử lí ở các phần sau -->
                <input class="search" type="submit" id="Btimkiem" name="search" value="Search" placeholder="Search..." />
                
                </div>
                </form>
                
            </ul>
        </div>
<?php
    //isset là kiểm tra đã tồn tại hay chưa, $_GET là lấy cái giá trị cần tìm trong đường link nó ấn vào
    if(isset($_GET['xem'])&&$_GET['xem']=='logout')
    {
        //unset là xóa bỏ giá trị
        unset($_SESSION['dangnhap']);
        //header kiểu như là bay về 1 trang chỉ định
        header('location:index.php');
    }
?>