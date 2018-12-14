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
        if($tam=='quanlihieusanpham')
        {
            include('modules/quanlihieusanpham/main.php');
        }
    ?>
        <div class="clear"></div>