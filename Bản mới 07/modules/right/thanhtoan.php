<?php
    if(!isset($_SESSION['dangnhap']))
    {
        header('location:index.php?xem=dangnhaptk&id');
    }
    else
    {
     for($i=0 ; $i< @$_SESSION["sodong"];$i++)
      {
          
      }
    }
    ?>
     <p> Địa chỉ giao Hàng: <input type="text" name="CD" value="<?php echo @$_SESSION['diachi'] ?>"> 
     <p> Số điện thoại người nhận: <input type="text" name="DT" value="<?php echo @$_SESSION['sodienthoai'] ?>"> 

    <p>Tổng Hóa Đơn: <?php echo @$_SESSION['tongtien']?> VNĐ </p>
    <span style="float:right;"><a href="index.php?xem=dathang&id="><input type="submit" name="dathang" value="Đặt Hàng" ></span>