<div class="content">
        <div class="left">
            <?php
                include('modules/left/danhsach.php');
            ?>
        </div> 

        <div class="right">
            <?php
                if(isset($_GET['xem']))
                {
                    $tam=$_GET['xem'];
                }
                else
                {
                    $tam='';
                }
                if($tam=='chitietloaisanpham')
                {
                    include('modules/right/chitietloaisanpham.php');
                }
                elseif($tam=='chitietsanpham')
                {
                    include('modules/right/chitietsanpham.php');
                }
                else
                    include('modules/right/tatcasanpham.php');
            ?>
        </div>  
            
</div>
        <div class="clear"></div>