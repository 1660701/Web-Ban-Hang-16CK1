<?php
    if(!isset($_SESSION['dangnhap']))
    {
        header('location:index.php?xem=dangnhaptk&id');
    }
    else
    {
    $sql="select * from nguoidung where UserName='$_GET[id]'";
       $run=mysqli_query($conn,$sql);
       $dong =mysqli_fetch_array($run);
    }
?>
<form class ="Ten" action="">
<center>
<table>
    <tr>
        <td colspan="2"><div align="center">Thông tin người dùng</div></td>
    </tr>
    <tr>
        <td><img src="images/avt/<?php echo $dong['HinhAnh']?>" width='100px'></td>
    </tr>
    
    <tr>
        <td>Xin chào:</td>
        <td><?php echo $dong['UserName'] ?></td>
    </tr>
    <tr>
        <td>Thông tin liên lạc</td>
    </tr>
    <tr>
        <td>Số điện thoại</td>
        <td><?php echo $dong['SoDienThoai'] ?></td>
    </tr>
    <tr>
        <td>Địa chỉ</td>
        <td><?php echo $dong['DiaChi'] ?></td>
    </tr><tr>
        <td>Email</td>
        <td><?php echo $dong['Email'] ?></td>
    </tr>
    <tr>
        <td>Loại tài khoản</td>
        <td><?php 
            if($dong['Quyen']==1)
            {
                echo 'ADMIN';
            ?>
            <a href="index.php?xem=quanliadmin&id=<?php echo @$_SESSION['dangnhap']?>"><input class="buttonmuahang" type="button" name="admincp" id="admincp" value="Trang quản lí" /></a>
            <?php
            }
            else
            {
                echo 'USER';
            }
        ?></td>
    </tr>
    </table>
    <br>
    <a href="index.php?xem=doimk&id=<?php echo @$_SESSION['dangnhap']?>"><input class="buttonmuahang" type="button" name="doimk" id="doimk" value ="Đổi mật khẩu" /></a>
    <a href="index.php?xem=doittnd&id=<?php echo @$_SESSION['dangnhap']?>"><input class="buttonmuahang" type="button" name="doittnd" id="doittnd" value ="Đổi thông tin cá nhân" /></a>
    </center>
    
</form>