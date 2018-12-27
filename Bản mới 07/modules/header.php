<?php include('config.php'); ?>

<div class="header">
            <img src="images/banner.jpg" width="100%" height="200px">
            <?php
            if(isset($_SESSION['dangnhap']))
            {
                echo '<div class="dropdown">Xin chào: '.$_SESSION['dangnhap'].'<a class="dropdown-content" href="index.php?xem=logout&id=1">Đăng xuất</a></div>';
            }
            else
            {
                echo 'Chào mừng bạn đến với trang web bán hàng của chúng tôi';
            }
            ?>
</div>