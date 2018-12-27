<?php
//vẫn là isset với $_GET là kiểm tra tồn tại và lấy dữ liệu sau id=
//empty là bỏ trống !empty là tồn tại 
  if(isset($_GET['id']) && !empty($_GET['id']))
    {
        $id=$_GET['id'];
        //Nếu đường link dẫn tới đây thì cái sản phẩm có id trên đường link đó sẽ được thêm 1sp vào giỏ hàng
        @$_SESSION['cart_'.$id]+=1;
    }
       
        if(isset($_GET['them']))
        {
            //Giống như trên
            $_SESSION['cart_'.$_GET['them']]+=1;
            header('location:index.php?xem=giohang&id=1');
        }
        if(isset($_GET['tru']))
        {
            //bỏ bớt 1 sp trong giỏ hàng
            $_SESSION['cart_'.$_GET['tru']]--;
            header('location:index.php?xem=giohang&id=1');
        }
        if(isset($_GET['delete']))
        {
            //xóa luôn sản phẩm trong giỏ hàng theo cái id sp
            $_SESSION['cart_'.$_GET['delete']]=0;
            header('location:index.php?xem=giohang&id='.$id.'');
        }
        //Tạo giá trị mặc định khi giỏ hàng chưa có sp
        $thanhtien =0;
        $tongtien=0;
        //chạy vòng lặp và gán giá trị
        foreach($_SESSION as $name => $value)
        {
            //Kiểm tra điều kiện để thực hiện cho phù hợp
            if($value >0)
            {
                //substr là lấy số kí tự trong chuỗi ra
                if(substr($name,0,5)=='cart_')
                {
                    //strlen là đếm số kí tự
                    $len= strlen($name)-5;
                
                    $id=substr($name,5,$len);
                    $id;
                    //mấy câu lệnh quen thuộc đã nói ở các phần khác
                    $sqldetail = "select * from sanpham where MaSP='$id'";
                    $result= mysqli_query($conn,$sqldetail);
                     
                    while($dong=mysqli_fetch_array($result))
                    {
                        // Tính giá trị của tất cả sản phẩm được đưa vào giỏ hàng
                        $tongtien=$dong['Gia']*$value;

                        echo '<br />'.$dong['TenSP'].' '.$value.'x'.$dong['Gia'].' tổng '.$tongtien.'<br/>
                        <a href="index.php?xem=giohang&id=1&them='.$id.'">[+]</a>
                        <a href="index.php?xem=giohang&id=1&tru='.$id.'">[-]</a>
                        <a href="index.php?xem=giohang&id=1&delete='.$id.'">[delete]</a><br/>';
                    }
                }
                $thanhtien+=$tongtien;
            
            }
                          
            
        }
        if($thanhtien!=0)
          
             echo 'Tổng Tiền :'.$thanhtien.' VNĐ';
?>
<a href="index.php?xem=thanhtoan&id=<?php echo @$_SESSION['dangnhap']?>">
<input class="button" type="button" name="thanhtoan" id="thanhtoan" value="Tiến hành thanh toán"></a>