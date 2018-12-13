<?php
    $sql="select * from nhasanxuat order by ID desc";
    $run=mysqli_query($conn,$sql);
?>
<table width="100%" border="1">
    <tr>
        <td>ID</td>
        <td>Hiệu sản phẩm</td>
        <td>Thứ tự</td>
        <td colspan="2">Quản lí</td>
    </tr>
    <?php
        $i=0;
        while($dong=mysqli_fetch_array($run))
        {
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $dong['Ten'] ?></td>
        <td><a href="index.php?quanli=quanlihieusanpham&ac=sua&id=<?php echo $dong['ID']?>">Sửa</a></td>
        <td><a href="modules/quanlihieusanpham/xuly.php?id=<?php echo $dong['ID'] ?>">Xóa</a></td>
    </tr>
    <?php
        $i++;
        }
    ?>
</table>