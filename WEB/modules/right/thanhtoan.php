<?php
    $c=@$_SESSION['tongtien'];
    if(!isset($_SESSION['dangnhap']))
    {
        header('location:index.php?xem=dangnhaptk&id');
    }
    else
    {
       
    }
    ?>
    <form action="" method="POST">
    <table class="table1">
    <tr>
    <td>
     <p> Địa chỉ giao Hàng:</p>
     </td>
     <td>
      <input type="text" name="CD" value="<?php echo @$_SESSION['diachi'] ?>"> </td>
     </tr>
     <tr>
     <td>
     <p> Số điện thoại người nhận:</p></td>
     <td>
      <input type="text" name="DT" value="<?php echo @$_SESSION['sodienthoai'] ?>"></td>
     </tr>
    <tr>
    <td>
    <p>Tổng Hóa Đơn:</p></td>
    <td>
     <?php echo @$_SESSION['tongtien']?> VNĐ 
     </td>
     </tr>
    </table>
    <span style="float:right;"><a href="index.php">
    <input class="button" type="submit" name="dathang" value="Đặt Hàng" ></a></span>
    </form>
    <?php
     if(isset($_GET['thanhtoan']))
     {
         unset($_SESSION['giohang']);
         header('location:index.php');
     }
    ?>