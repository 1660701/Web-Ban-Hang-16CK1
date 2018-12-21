<?php
        
    if(isset($_POST['dangki']))
    {
        $UserName=$_POST['tk'];
        $Password=$_POST['mk'];
        $SoDienThoai=$_POST['sdt'];
        $DiaChi=$_POST['diachi'];
        $Email=$_POST['email'];
        $HinhAnh=$_FILES['hinhanh']['name'];
        $HinhAnh_tmp=$_FILES['hinhanh']['tmp_name'];
        move_uploaded_file($HinhAnh_tmp,'images/avt/'.$HinhAnh);
        
        $sql="insert into nguoidung (UserName,Password,SoDienThoai,DiaChi,Email,HinhAnh) values ('$UserName','$Password','$SoDienThoai','$DiaChi','$Email','$HinhAnh');";
        $run=mysqli_query($conn,$sql);
        if($run)
        {
            header('location:index.php');
        }
    }
?>
            <form action="index.php?xem=dangkitk&id=1" method="post" enctype="multipart/form-data">
                        <center>
                        <table width="200">
                            <tr>
                                <td colspan="2"><div align="center"><b>Đăng kí tài khoản</b></div></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td><input type="text" name="tk" size="20"></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="password" name="mk" size="20"></td>
                            </tr>
                            <tr>
                                <td>Số điện thoai</td>
                                <td><input type="text" name="sdt" size="20"></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td><input type="text" name="diachi" size="20"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" name="email" size="20"></td>
                            </tr>
                            <tr>
                                <td>Hình ảnh</td>
                                <td><input type="file" name="hinhanh" size="20"></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div align="center">
                                        <input type="submit" name="dangki" id="dangki" value="Đăng kí">
                                    </div>
                                </td>
                            </tr>
                        </table>
                        </center>
            </form>