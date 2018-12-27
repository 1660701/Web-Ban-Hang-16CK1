<!-- Gọi lại kết nối CSDL -->
<?php include('config.php'); ?>

<div class="header">
            <!-- sửa banner thì vào đây mà sửa -->
            <img src="images/banner.jpg" width="100%" height="200px">
            <?php
            //Kiểm tra đăng nhập hay chưa để xuất thông tin cho phù hợp
            if(isset($_SESSION['dangnhap']))
            {
                //Nếu đã đăng nhập xuất ra xin chao:xxx và khi rê chuột vào sẽ hiện button đăng xuất
                //buttn này được xử lí bằng css
                echo '<div class="dropdown">Xin chào: '.$_SESSION['dangnhap'].'<a class="dropdown-content" href="index.php?xem=logout&id=1">Đăng xuất</a></div>';
            }
            else
            {
                //Chưa đăng nhập thì sẽ xuất ra câu chào của trang web
                echo 'Chào mừng bạn đến với trang web bán hàng của chúng tôi';
            }
            ?>
</div>