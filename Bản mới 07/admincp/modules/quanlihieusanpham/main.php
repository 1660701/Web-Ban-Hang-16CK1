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
            include('modules/quanlihieusanpham/them.php');
        }
        if($tam=='sua')
        {
            include('modules/quanlihieusanpham/sua.php');
        }
    ?>
</div>
<div class="right">
    <?php
        include('modules/quanlihieusanpham/lietke.php');
    ?>
</div>