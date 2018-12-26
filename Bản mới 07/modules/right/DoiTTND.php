<?php
    
    if(isset($_POST['doittnd']))
    {
        $sdt=$_POST['sdt'];
        $diachi=$_POST['diachi'];
        $email=$_POST['email'];
        $HinhAnh=$_FILES['hinhanh']['name'];
        $HinhAnh_tmp=$_FILES['hinhanh']['tmp_name'];
        move_uploaded_file($HinhAnh_tmp,'images/avt/'.$HinhAnh);
            
        if($HinhAnh!='')
        {
            $sql_capnhap="update nguoidung set SoDienThoai='$sdt',DiaChi='$diachi',Email='$email',HinhAnh='$HinhAnh'  where UserName='$_GET[id]'";
            mysqli_query($conn,$sql_capnhap);
            echo 'Cập nhật thành công';
        }
        else
        {
            $sql_capnhap="update nguoidung set SoDienThoai='$sdt',DiaChi='$diachi',Email='$email' where UserName='$_GET[id]'";
            mysqli_query($conn,$sql_capnhap);
            echo 'Bạn đã cập nhật tài khoản thành công';
        }
    }
?>
<?php
    $sql="select * from nguoidung where UserName='$_GET[id]'";
    $run=mysqli_query($conn,$sql);
    $dong=mysqli_fetch_array($run);
?>
<form action="" method="post" enctype="multipart/form-data">
<center>
<table width="100%">

    <tr>
        <td colspan="2"><div align="center">Đổi thông tin cá nhân</div></td>
    </tr>
    <tr>
        <td>Số điện thoại</td>
        <td><input type="text" name="sdt" size="70" value="<?php echo $dong['SoDienThoai'] ?>"></td>
    </tr>
    <tr>
        <td>Địa chỉ </td>
        <td><input type="text" name="diachi" size="70" value="<?php echo $dong['DiaChi'] ?>"></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="text" name="email" size="70" value="<?php echo $dong['Email'] ?>"></td>
    </tr>
    <tr>
        <td>Hình ảnh</td>
        <td><input type="file" name="hinhanh" /><img src="images/avt/<?php echo $dong['HinhAnh']?>" width="60" /></td>
    </tr>
        <td colspan="2"><div align="center"><input class="buttonmuahang" type="submit" name="doittnd" id="doittnd" value="Đổi thông tin"></div></td>
    </tr>

</table>
</center>
</form>