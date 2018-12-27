<?php
    //!isset là kiểm tra không tồn tại
    if(!isset($_SESSION['dangnhap']))
    {
        //Bay về theo 1 đường link chỉ định
        header('location:index.php?xem=dangnhaptk&id');
    }
    else
    {
        //Xuất ra tất cả các người dùng có điểu kiện là User = id của phần đường link
    $sql="select * from nguoidung where UserName='$_GET[id]'";
        //Chạy code sql và gán dữ liệu vào $run
       $run=mysqli_query($conn,$sql);
       //lấy giá trị theo dòng
       $dong =mysqli_fetch_array($run);
    }
?>
<!-- Form xuất thông tin đã lấy được ở trên -->
<form class ="Ten" action="">
<center>
<table>
    <tr>
        <td colspan="2"><div align="center">Thông tin người dùng</div></td>
    </tr>
    <tr>
        <!-- Xuất hình ảnh nè -->
        <td><img src="images/avt/<?php echo $dong['HinhAnh']?>" width='100px'></td>
    </tr>
    
    <tr>
        <!-- Giá trị 1 dòng lấy ở trên mình sẽ lấy 1 cột trong dòng đấy ra -->
        <td>Xin chào:</td>
        <td><?php echo $dong['UserName'] ?></td>
    </tr>
    <tr>
        <td>Thông tin liên lạc</td>
    </tr>
    <tr>
         <!-- Giá trị 1 dòng lấy ở trên mình sẽ lấy 1 cột trong dòng đấy ra -->
        <td>Số điện thoại</td>
        <td><?php echo $dong['SoDienThoai'] ?></td>
    </tr>
    <tr>
         <!-- Giá trị 1 dòng lấy ở trên mình sẽ lấy 1 cột trong dòng đấy ra -->
        <td>Địa chỉ</td>
        <td><?php echo $dong['DiaChi'] ?></td>
    </tr><tr>
         <!-- Giá trị 1 dòng lấy ở trên mình sẽ lấy 1 cột trong dòng đấy ra -->
        <td>Email</td>
        <td><?php echo $dong['Email'] ?></td>
    </tr>
    <tr>
        <!-- Này kiểm tra xem đang ở quyền hạn gì -->
        <td>Loại tài khoản</td>
        <td><?php 
            // nếu quyền =1 sẽ hiện ra thông tin là admin và có button đi đến trang quản lí  
            if($dong['Quyen']==1)
            {
                echo 'ADMIN';
            ?>
            <a href="index.php?xem=quanliadmin&id=<?php echo @$_SESSION['dangnhap']?>"><input class="buttonmuahang" type="button" name="admincp" id="admincp" value="Trang quản lí" /></a>
            <?php
            }
            else
            {
                //không là admin thì ko có quyền đi đến trang quản lí
                echo 'USER';
            }
        ?></td>
    </tr>
    </table>
    <br>
    <!-- 2 button quản lí thông tin tài khoản, nhớ chú ý phần xem= và id= -->
    <a href="index.php?xem=doimk&id=<?php echo @$_SESSION['dangnhap']?>"><input class="buttonmuahang" type="button" name="doimk" id="doimk" value ="Đổi mật khẩu" /></a>
    <a href="index.php?xem=doittnd&id=<?php echo @$_SESSION['dangnhap']?>"><input class="buttonmuahang" type="button" name="doittnd" id="doittnd" value ="Đổi thông tin cá nhân" /></a>
    </center>
    
</form>