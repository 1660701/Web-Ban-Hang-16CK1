<!-- lúc xủa lí nó sẽ đi vào đây trước -->

<div class="left">
    <?php
        //kiểm tra hành động của nó là gì
        if(isset($_GET['ac']))
        {
            $tam=$_GET['ac'];
        }
        else{
            $tam='';
        }
        if($tam=='them')
        {
            include('modules/quanliloaisanpham/them.php');
        }
        if($tam=='sua')
        {
            include('modules/quanliloaisanpham/sua.php');
        }
    ?>
</div>
<div class="right">
    <?php
    //xuất ra các thông tin của dữ liệu
        include('modules/quanliloaisanpham/lietke.php');
    ?>
</div>