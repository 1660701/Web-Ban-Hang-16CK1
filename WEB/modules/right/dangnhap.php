<?php
//Kiểm tra đăng nhập hay chưa để xuât ra dữ liệu phù hợp
if(isset($_SESSION['dangnhap']))
{
        header('location:index.php?xem=thongbao&id=1');
}
else
{
    //Nếu button là login thì sẽ đi xử lí
    if(isset($_POST['login']))
    {
        $UserName=$_POST['UserName'];
        $Password=$_POST['Password'];
        //Kiểm tra username và password nó nhập vào có trong csdl hay chưa
        $sql="select UserName,Password from nguoidung where UserName='$UserName' and Password='$Password'";
        $query=mysqli_query($conn,$sql);
        $nums=mysqli_num_rows($query);
        //num là để đếm xem nó đã chạy hay chưa, chạy được bao nhiêu lần
        if($nums>0)
        {
            //nếu chạy được thì sẽ gán vào session đăng nhập để đi xử lí các vấn đề khác
            $_SESSION['dangnhap']=$UserName;
            header('location:index.php');
        }
        else
        {
            //nếu chưa chạy thì sẽ đăng nhập lại
            header('location:index.php?xem=dangnhaptk&id=1');
        }
    }
}      
//Form điền thông tin      
?>
                        <form method="post" action="">
                        <center>
                        <table width="200">
                            <tr>
                                <td colspan="2"><div align="center">Login</div></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td><input type="text" name="UserName" size="20"></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="password" name="Password" size="20"></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div align="center">
                                        <input class="buttonmuahang" type="submit" name="login" id="button" value="Login">
                                    </div>
                                </td>
                            </tr>
                        </table>
                        </center>
                        </form>
