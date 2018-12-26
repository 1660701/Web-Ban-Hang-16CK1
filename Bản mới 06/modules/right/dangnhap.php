<?php
                   // session_start();

                    if(isset($_POST['login']))
                    {
                        $UserName=$_POST['UserName'];
                        $Password=$_POST['Password'];
                        $sql="select UserName,Password from nguoidung where UserName='$UserName' and Password='$Password'";
                        $query=mysqli_query($conn,$sql);
                        $nums=mysqli_num_rows($query);
                        
                        if($nums>0)
                        {
                            $_SESSION['dangnhap']=$UserName;
                            header('location:index.php');
                        }
                        else
                        {
                            header('location:index.php?xem=dangnhaptk&id=1');
                        }
                    }
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
                                        <input type="submit" name="login" id="button" value="Login">
                                    </div>
                                </td>
                            </tr>
                        </table>
                        </center>
                        </form>
