<?php
  if(isset($_GET['id']) && !empty($_GET['id']))
    {
        $id=$_GET['id'];
        @$_SESSION['cart_'.$id]+=1;
    }
       
        if(isset($_GET['them']))
        {
            $_SESSION['cart_'.$_GET['them']]+=1;
            header('location:index.php?xem=giohang&id=1');
        }
        if(isset($_GET['tru']))
        {
            $_SESSION['cart_'.$_GET['tru']]--;
            header('location:index.php?xem=giohang&id=1');
        }
        if(isset($_GET['delete']))
        {
            $_SESSION['cart_'.$_GET['delete']]=0;
            header('location:index.php?xem=giohang&id='.$id.'');
        }

        $thanhtien =0;
        $tongtien=0;
        foreach($_SESSION as $name => $value)
        {
            if($value >0)
            {
                if(substr($name,0,5)=='cart_')
                {
               
                    $len= strlen($name)-5;
                
                    $id=substr($name,5,$len);
                    $id;
                
                    $sqldetail = "select * from sanpham where MaSP='$id'";
                    $result= mysqli_query($conn,$sqldetail);
                     
                    while($dong=mysqli_fetch_array($result))
                    {

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