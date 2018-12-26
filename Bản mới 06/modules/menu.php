<?php
if (isset($_GET['muahang'])) {
   $id = $_GET['muahang'];
   if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])) {
      $count = count($_SESSION['giohang']);
      $flag = false;
      for ($i = 0; $i < $count; $i++) {
         if ($_SESSION['giohang'][$i]["id"] == $id) {
            $_SESSION['giohang'][$i]["soluong"] += 1;
            $flag = true;
            break;
         }
      }
      if ($flag == false) {
         $_SESSION['giohang'][$count]["id"] = $id;
         $_SESSION['giohang'][$count]["soluong"] = 1;
      }
     echo $_SESSION['giohang'][$i]["soluong"];
   } else {
      $_SESSION['giohang'] = array();
      $_SESSION['giohang'][0]["id"] = $id;
      $_SESSION['giohang'][0]["soluong"] = 1;
   }
   header("Location: index.php");

}

?>
<div class="menu">
            <ul>
                <li><a href="index.php">Trang chủ</a> </li>
                <li><a href="index.php?xem=tatcasanpham&id=1">Tất cả sản phẩm</a> </li>
                <li><a href="index.php?xem=dangnhaptk&id='.$_SESSION['dangnhap'].'">Đăng nhập</a></li>
                <li><a href="index.php?xem=dangkitk&id=1">Đăng kí</a></li>
                <li><a href="index.php?xem=thongtinnguoidung&id=1">Thông tin cá nhân</a></li>
            
                <li><a href="index.php">
                <div>
                           <strong>
                              <i class="icon-shopping-cart">&nbsp;</i>
                              <?php
                              $tongtien = 0;
                              if (isset($_SESSION['giohang'])) {
                                 echo count($_SESSION['giohang']);
                                 for ($i = 0; $i < count($_SESSION['giohang']); $i++) {
                                    $query = mysqli_query($conn,"select * from sanpham where id = " . $_SESSION['giohang'][$i]['id']);
                                    $row = mysqli_fetch_array($query);
                                    $tongtien = $tongtien + ($row['Gia'] * $_SESSION['giohang'][$i]['soluong']);
                                 }
                              } else {
                                 echo "0";
                              }
                              ?>
                           </strong>
                           items
                           &nbsp;|&nbsp;
                           <strong class="active-color">
                              <?php echo $tongtien; ?> &euro;
                           </strong>
                        </a>
                        <a href="index.php?xem=giohang&id=1"><input type="submit" name="giohang" value="Giỏ Hàng"></a>
                        </div>
             </li>

                <form action="index.php" method="post" enctype="multipart/form-data">
                <div class="TimKiem">
                <input type="text" id="Ftimkiem" name="Ftimkiem" />
                <input type="submit" id="Btimkiem" name="search" value="Search" placeholder="Search..." />
                
                </div>
                </form>
                <li> <a href="index.php?xem=logout&id=1">Đăng xuất</a>
            </ul>
        </div>
<?php
    
    if(isset($_GET['xem'])&&$_GET['xem']=='logout')
    {
        unset($_SESSION['dangnhap']);
        header('location:index.php');
    }
?>