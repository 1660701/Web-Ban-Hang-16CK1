<div class="content">
    <?php
        if(isset($_GET['quanli']))
        {
            $tam=$_GET['quanli'];
        }
        else{
            $tam='';
        }
        if($tam=='quanliloaisanpham')
        {
            include('modules/quanliloaisanpham/main.php');
        }
        else if($tam=='quanlihieusanpham')
        {
            include('modules/quanlihieusanpham/main.php');
        }
        else if($tam=='quanlisanpham')
        {
            include('modules/quanlisanpham/main.php');
        }
        else if($tam=='quanlidonhang')
        {
            include('modules/quanlidonhang/lietke.php');
        }
    ?>
        <div class="clear"></div>