<?php
//Giống như bên DOITTND
    if(isset($_POST['doimk']))
    {
        $username=$_POST['username'];
        $passcu=$_POST['passcu'];
        $passmoi=$_POST['passmoi'];
        $sql_doimk=mysqli_query($conn,"select * from nguoidung where UserName='$username' and Password='$passcu' limit 1");
        $count=mysqli_num_rows($sql_doimk);
        if($count==0||$username!=$_GET['id'])
        {
            echo 'Sai tài khoản hoặc mật khẩu, vui lòng nhập lại';
        }
        else
        {

                $sql_capnhat=mysqli_query($conn,"update nguoidung set Password='$passmoi' where UserName='$username'");
                echo 'Bạn đã cập nhật tài khoản thành công';
            
        }
    }
?>
<!-- Chú ý name ở cả input và button -->
<form action="" method="post">
<table width="100%" borde>
    <tr>
        <td colspan="2"><div align="center">Đổi mật khẩu</div></td>
    </tr>
    <tr>
        <td>Tên tài khoản</td>
        <td><input type="text" name="username"></td>
    </tr>
    <tr>
        <td>Nhập mật khẩu cũ: </td>
        <td><input type="password" name="passcu"></td>
    </tr>
    <tr>
        <td>Nhập mật khẩu mới: </td>
        <td><input type="password" name="passmoi" ></td>
    </tr>
        <td colspan="2"><div align="center"><input class="buttonmuahang" type="submit" name="doimk" id="doimk" value="Đổi mật khẩu"></div></td>
    </tr>
</table>
</form>