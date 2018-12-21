<h1>Giỏ Hàng</h1>
<?php
   session_start();
  if(isset($_GET['id']))
    {
        $id = $_GET['id'];
       @$_SESSION['cart_'.$id]+=1;
    }
       
        if(isset($_GET['them']))
        {
            $_SESSION['cart_'.$_GET['them']]+=1;
            header('location:index.php?xem=giohang');
        }
        if(isset($_GET['tru']))
        {
            $_SESSION['cart_'.$_GET['tru']]--;
            header('location:index.php?xem=giohang');
        }
        if(isset($_GET['delete']))
        {
            $_SESSION['cart_'.$_GET['delete']]=0;
            header('location:index.php?xem=giohang');
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
                
                    $sqldetail = "select * from sanpham where MaSP='$id'";
                    $result= mysqli_query($conn,$sqldetail);
                     
                    while($dong=mysqli_fetch_array($result)){

                        $tongtien=$dong['Gia']*$value;
                        echo $dong['TenSP'].'X'.$value.'@'.$dong['Gia'].$tongtien.'<a href="index.php?xem=giohang&them='.$id.'">[+]</a>
                        <a href="index.php?xem=giohang&tru='.$id.'">[-]</a>
                        <a href="index.php?xem=giohang&delete='.$id.'">[delete]</a><br/><br/><br/><br/>';
                    }
                }
                $thanhtien+=$tongtien;
            
            }
                          
            
        }
        if($thanhtien!=0)
            {
             echo 'Tổng Tiền :'.$thanhtien.'VNĐ';
           
            } 
        
    

  

?>