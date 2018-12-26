<?php
    $sql="select * from sanpham where MaSP='$_GET[id]'";
    $run=mysqli_query($conn,$sql);
    $dong=mysqli_fetch_array($run);
?>
<form action="modules/quanlisanpham/xuly.php?id=<?php echo $dong['MaSP'] ?>" method="post" enctype="multipart/form-data">
<table width="100%" border="1">
    <tr>
        <td colspan="2"><div align="center">Sửa thông tin sản phẩm</div></td>
    </tr>

    <tr>
        <td>Mã sản phẩm</td>
        <td><input type="text" name="masp" value=<?php echo $dong['MaSP'] ?>></td>
    </tr>
    <tr>
        <td>Tên sản phẩm</td>
        <td><input type="text" name="tensp" value=<?php echo $dong['TenSP'] ?>></td>
    </tr>
    <?php
        $sql_loaisp="select * from danhmuc";
        $run_loaisp=mysqli_query($conn,$sql_loaisp);
       
    ?>
    <tr>
        <td>Loại sản phẩm</td>
        <td><select name="loaisp">
        <?php
            while($dong_loaisp=mysqli_fetch_array($run_loaisp)){
                if($dong['NhaSanXuatID']==$dong_loaisp['ID'])
                {
        ?>
        <option value="<?php echo $dong_loaisp['ID'] ?>"><?php echo $dong_loaisp['Ten']?></option>
        <?php
                }else{
        ?>
         <option selected="selected" value="<?php echo $dong_loaisp['ID'] ?>"><?php echo $dong_loaisp['Ten']?></option>
        <?php
        }
        }
        ?>
        </select></td>
        
    </tr> 
    <?php
        $sql_nsx="select * from nhasanxuat";
        $run_nsx=mysqli_query($conn,$sql_nsx);
       
    ?>
    <tr>
        <td>Nhà sản xuất</td>
        <td><select name="nsx">
        <?php
            while($dong_nsx=mysqli_fetch_array($run_nsx)){
                if($dong['NhaSanXuatID']==$dong_nsx['ID'])
                {
        ?>
        <option value="<?php echo $dong_nsx['ID'] ?>"><?php echo $dong_nsx['Ten']?></option>
        <?php
                }else{
        ?>
         <option selected="selected" value="<?php echo $dong_nsx['ID'] ?>"><?php echo $dong_nsx['Ten']?></option>
        <?php
        }
        }
        ?>
        
        </select></td>
        
    </tr> 
    <tr>
        <td>Xuất xứ</td>
        <td><input type="text" name="xuatxu" value=<?php echo $dong['XuatXu'] ?>></td>
    </tr>
    <tr>
        <td>Mô tả</td>
        <td><input type="text" name="mota" value=<?php echo $dong['MoTa'] ?>></td>
    </tr>
    <tr>
        <td>Ngày tạo</td>
        <td><input type="date" name="ngaytao" value=<?php echo $dong['NgayTao'] ?>></td>
    </tr>
    <tr>
        <td>Số lượng</td>
        <td><input type="text" name="soluong" value=<?php echo $dong['SoLuong'] ?>></td>
    </tr>
    <tr>
        <td>Hình ảnh</td>
        <td><input type="file" name="hinhanh"><img src="../../../images/san_pham/<?php echo $dong['HinhAnh']?>" width="60"></td>
    </tr>
    <tr>
        <td>Giá gốc</td>
        <td><input type="text" name="giagoc" value=<?php echo $dong['GiaGoc'] ?>></td>
    </tr>
    <tr>
        <td>Giá</td>
        <td><input type="text" name="gia" value=<?php echo $dong['Gia'] ?>></td>
    </tr>
    <tr>
        <td>Lượt xem</td>
        <td><input type="text" name="luotxem" value=<?php echo $dong['LuotXem'] ?>></td>
    </tr>
    <tr>
        <td>Tình trạng</td>
        <td><input type="text" name="tinhtrang" value=<?php echo $dong['TinhTrang'] ?>></td>
    </tr>
    
    <tr>
        <td colspan="2"><div align="center"><input type="submit" name="sua" id="sua" value="Sửa"></div></td>
    </tr>
</table>
</form>