<?php
    

  if(isset($_GET['id']) && !empty($_GET['id']))
    {
        
        $id=$_GET['id'];
        @$_SESSION['cart_'.$id]+=1;
        
       
        
       
    
       
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
        $tongsoluong=0;
        echo '<table>
        <tr>
        <th>Tên Sản Phẩm</th>
        <th>Số Lượng</th>
        <th>Giá</th>
        <th>Tổng</th>
        <th>Xóa Sản Phẩm</th>
        </tr>
        </table>';
        $count=0;
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
                        $count=count($dong['TenSP']); 
                        $tongsoluong=$tongsoluong+$value;
                        
               
                        echo '<table>
                        
                        <tr>
                        <td>'.$dong['TenSP'].'</td>
                        
                        <td><a href="index.php?xem=giohang&id=1&tru='.$id.'">[-]</a>'
                        .$value.'
                        <a href="index.php?xem=giohang&id=1&them='.$id.'">[+]</a>
                        </td>
                        <td>'.$dong['Gia'].' </td> 
                        <td>'.$tongtien.'</td>
                       
                        <td>
                        <a href="index.php?xem=giohang&id=1&delete='.$id.'">[delete]</a></td>
                        </tr>
                        </table>';
                        for($i=0;$i<count($dong['TenSP']);$i++)
                        {
                            $_SESSION['giohang'][$i]['id']=$id;
                            $_SESSION['giohang'][$i]['soluong']=$value;
                            $_SESSION['giohang'][$i]['gia']=$dong['Gia'];
                            

                        }
                    }
                }
                $thanhtien+=$tongtien;
            }
                          
            
        }
       
        if($thanhtien!=0)
            
             echo '<table><tr><span class="ttt">Tổng Tiền :'.$thanhtien.' VNĐ</span></tr> </table>';
             $_SESSION["tongtien"]=$thanhtien;
             $_SESSION["sodong"]=$count;
        
             $_SESSION["soluong"]=$tongsoluong;
            
           
    }
?>
<br/><br/>
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
<span style="float:right;"><a href="index.php?xem=thanhtoan&id=<?php echo @$_SESSION['dangnhap']?>">
<input class="button" type="button" name="thanhtoan" id="thanhtoan" value="Tiến hành thanh toán"></td></a>
</span>
<?php
