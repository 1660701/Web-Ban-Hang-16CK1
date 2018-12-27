<!-- Kiểm tra đăng nhập hay chưa bằng cách kiểm tra tồn tại cái session hay chưa -->
<?php
    if(!isset($_SESSION['dangnhap']))
    {
        header('location:index.php?xem=dangnhaptk&id');
    }
    else
    {
        var_dump(@$thanhtien);
    }
    ?>