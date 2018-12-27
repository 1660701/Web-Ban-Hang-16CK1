<?php
    $c=@$_SESSION['tongtien'];
    if(!isset($_SESSION['dangnhap']))
    {
        header('location:index.php?xem=dangnhaptk&id');
    }
    else
    {
        $result= mysqli_query($conn,"insert into dathang(NguoiTao) values ('".$_SESSION['dangnhap']."')");
    if($result)
    {
     for($i=0 ; $i< count($_SESSION['giohang']);$i++)
      {
          $sql= mysqli_query($conn,"select max(ID) from dathang"); 
          $row= 0;
          $card_id= $row;
          $sanpham_id=  $_SESSION['giohang'][$i]['id'];
          $soluong = $_SESSION['giohang'][$i]['soluong'];
          $gia=$_SESSION['giohang'][$i]['gia'];
          mysqli_query($conn,"insert into chitietdathang(DatHangID, MaSP, SoLuong, Gia) values ('".$card_id."'
          ,'".$sanpham_id."','".$soluong."','".$gia."')");  
          
        

      }
    }
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
    <span style="float:right;"><a href="index.php?xem=dathang&id=">
    <input class="button" type="submit" name="dathang" value="Đặt Hàng" ></span>
    </form>
