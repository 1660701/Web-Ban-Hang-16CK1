<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style/css.css">
	
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <title>Cửa hàng quần áo</title>
</head>
<body>
<?php
//Bắt đầu giao tiếp với ứng dụng
session_start();
?>
    <div class="wrapper">
        <?php 
            //Chia bố cục từng phần để dể quản lí
            include('modules/header.php');
            include('modules/menu.php');
            include('modules/content.php');
            include('modules/footer.php');
        ?>
    </div>
</body>
</html>