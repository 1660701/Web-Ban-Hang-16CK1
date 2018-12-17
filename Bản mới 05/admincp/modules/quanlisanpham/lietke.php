<?php
    $sql="select * from sanpham order by ID desc";
    $run=mysqli_query($conn,$sql);
?>
<table width="100%" border="1">
    <tr>
        <td>Mã sản phẩm</td>
        <td>Tên sản phẩm</td>
        <td colspan="2"><b>Quản lí<b></td>
        <td></td>
    </tr>
    <?php
        $i=0;
        while($dong=mysqli_fetch_array($run))
        {
    ?>
    <tr>
        <td><?php echo $dong['MaSP'] ?></td>
        <td><?php echo $dong['TenSP'] ?></td>
        <td><a href="index.php?quanli=quanlisanpham&ac=sua&id=<?php echo $dong['ID']?>">Sửa</a></td>
        <td><a href="modules/quanlisanpham/xuly.php?id=<?php echo $dong['ID'] ?>">Xóa</a></td>
    </tr>
    <?php
        $i++;
        }
    ?>
</table>