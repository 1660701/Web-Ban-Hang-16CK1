<form action="modules/quanlisanpham/xuly.php" method="post" enctype="multipart/form-data">
<table width="100%" >
    <tr>
        <td colspan="2"><div align="center">Thêm sản phẩm</div></td>
    </tr>
    <tr>
        <td>Mã sản phẩm</td>
        <td><input type="text" name="masp"></td>
    </tr>
    <tr>
        <td>Tên sản phẩm</td>
        <td><input type="text" name="tensp"></td>
    </tr>
    <?php
        $sql="select * from danhmuc";
        $run=mysqli_query($conn,$sql);
       
    ?>
    <tr>
        <td>Loại sản phẩm</td>
        <td><select name="loaisp">
        <?php
            while($dong=mysqli_fetch_array($run)){
        ?>
        <option value="<?php echo $dong['ID'] ?>"><?php echo $dong['Ten']?></option>
        <?php
            }
        ?>
        </select></td>
        
    </tr>
    <?php
        $sql="select * from nhasanxuat";
        $run=mysqli_query($conn,$sql);
       
    ?>
    <tr>
    <tr>
        <td>Nhà sản xuất</td>
        <td><select name="nsx">
        <?php
            while($dong=mysqli_fetch_array($run)){
        ?>
        <option value="<?php echo $dong['ID'] ?>"><?php echo $dong['Ten']?></option>
        <?php
            }
        ?>
        </select></td>
        
    </tr>
    </tr>
    <tr>
        <td>Xuất xứ</td>
        <td><input type="text" name="xuatxu"></td>
    </tr>
    <tr>
        <td>Mô tả</td>
        <td><textarea name="mota" cols="20"></textarea></td>
    </tr>
    <tr>
        <td>Ngày tạo</td>
        <td><input type="date" name="ngaytao"></td>
    </tr>
    <tr>
        <td>Số lượng</td>
        <td><input type="text" name="soluong"></td>
    </tr>
    <tr>
        <td>Hình ảnh</td>
        <td><input type="file" name="hinhanh"></td>
    </tr>
    <tr>
        <td>Giá Gốc</td>
        <td><input type="text" name="giagoc"></td>
    </tr>
    <tr>
        <td>Giá</td>
        <td><input type="text" name="gia"></td>
    </tr>
    
    <tr>
        <td>Lượt xem</td>
        <td><input type="text" name="luotxem"></td>
    </tr>
    <tr>
        <td>Tình trạng</td>
        <td><input type="text" name="tinhtrang"></td>
    </tr>
    <tr>
        <td colspan="2"><div align="center"><input type="submit" name="them" id="them" value="Thêm"></div></td>
    </tr>
</table>
</form>