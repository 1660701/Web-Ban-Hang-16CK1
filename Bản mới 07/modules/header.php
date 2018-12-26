<?php include('config.php'); ?>

<div class="header">
            <img src="images/banner.jpg" width="100%" height="200px">
            <?php
            if(isset($_SESSION['dangnhap']))
            {
                echo 'Xin chào: '.$_SESSION['dangnhap'];
            }
            else
            {
                echo 'Chào mừng bạn đến với trang web bán hàng của chúng tôi';
            }
            ?>
</div>