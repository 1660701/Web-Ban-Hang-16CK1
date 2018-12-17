<div class="left">
    <?php
        if(isset($_GET['ac']))
        {
            $tam=$_GET['ac'];
        }
        else{
            $tam='';
        }
        if($tam=='them')
        {
            include('modules/quanlisanpham/them.php');
        }
        if($tam=='sua')
        {
            include('modules/quanlisanpham/sua.php');
        }
    ?>
</div>
<div class="right">
    <?php
        include('modules/quanlisanpham/lietke.php');
    ?>
</div>