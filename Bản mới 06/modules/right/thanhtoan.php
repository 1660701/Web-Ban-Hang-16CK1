<<p>thanh toán
</p>>
<?php
 session_start();
 if(!isset($_SESSION['dangnhap']))
 {
     header('location:dangnhap.php');
 }
 else
 {
     header('location:thanhtoan.php');
 }

?>