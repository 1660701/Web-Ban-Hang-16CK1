<?php
    $c=@$_SESSION['tongtien'];
    if(!isset($_SESSION['dangnhap']))
    {
        header('location:index.php?xem=dangnhaptk&id');
    }
    else
    {
        $result= mysqli_query($conn,"INSERT into dathang(NguoiTao) values ('".$_SESSION['dangnhap']."')");
    if($result)
    {
     for($i=0 ; $i< count($_SESSION['giohang']);$i++)
      {
          $sql= mysqli_query($conn,"SELECT max(ID) from dathang"); 
          $row= mysqli_fetch_array($sql);
          $card_id= $row[0];
          $sanpham_id=  $_SESSION['giohang'][$i]['id'];
          $soluong = $_SESSION['giohang'][$i]['soluong'];
          $gia=$_SESSION['giohang'][$i]['gia'];
          mysqli_query($conn,"INSERT into chitietdathang(DatHangID, MaSP, SoLuong, Gia) values ('".$card_id."'
          ,'".$sanpham_id."','".$soluong."','".$gia."')");  
      }
     
      unset($_SESSION['giohang']);
      header('Location: index.php');
      
    }
      
    }
    ?>
    <form action="" method="POST">
     <p> Địa chỉ giao Hàng: <input type="text" name="CD" value="<?php echo @$_SESSION['diachi'] ?>"> 
     <p> Số điện thoại người nhận: <input type="text" name="DT" value="<?php echo @$_SESSION['sodienthoai'] ?>"> 

    <p>Tổng Hóa Đơn: <?php echo @$_SESSION['tongtien']?> VNĐ </p>
    <span style="float:right;"><a href="index.php?xem=dathang&id=">
    <input type="submit" name="dathang" value="Đặt Hàng" ></span>
    </form>
    
