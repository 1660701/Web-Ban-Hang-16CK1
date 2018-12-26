<?php include('../config.php'); 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style/css.css" >
    <title>Quản trị nội dung website</title>
</head>
<body>
    <?php
        $run=mysqli_query($conn,"select * from nguoidung where UserName='$_SESSION[dangnhap]'");
        $dong =mysqli_fetch_array($run);
        if($dong['Quyen']==1)
            {
            ?>
                <div class="wrapper">
                <?php
                    include('modules/header.php');
                    include('modules/menu.php');
                    include('modules/content.php');
                    include('modules/footer.php');
                ?>
            </div>
            <?php
            }
            else
            {
                echo 'Bạn không đủ quyền để vào trang này';
            }
    ?>
    
</body>
</html>