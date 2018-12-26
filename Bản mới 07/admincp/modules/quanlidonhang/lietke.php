<?php
    include('../config.php');
?>
<?php
    $sql="select * from chitietdathang order by ID desc";
    $run=mysqli_query($conn,$sql);
?>
<table width="100%" border="1">
    <tr>
        <td>DatHangID</td>
        <td>MaSP</td>
        <td>Số lượng</td>
        <td>Giá</td>
        <td>Tình Trạng</td>
        <td>Ngày dự kiến giao hàng</td>
        <td>Ghi chú</td>
        <td colspan="2"><b>Quản lí<b></td>
        <td></td>
    </tr>
    <?php
        while($dong=mysqli_fetch_array($run))
        {        
    ?>
    <tr>
        <td><?php echo $dong['DatHangID'] ?></td>

        <td><?php echo $dong['MaSP'] ?></td>

        <td><?php echo $dong['SoLuong'] ?></td>

        <td><?php echo $dong['Gia'] ?></td>

        <td><?php echo $dong['TinhTrang'] ?></td>

        <td><?php echo $dong['NgayDuKienGiaoHang'] ?></td>

        <td><?php echo $dong['GhiChu'] ?></td>
        <td><a href="index.php?quanli=quanlidonhang&ac=sua&id=<?php echo $dong['DatHangID']?>">Sửa</a></td>
        <td><a href="modules/quanlidonhang/xuly.php?id=<?php echo $dong['ID'] ?>">Xóa</a></td>
    </tr>
    <?php
        }
    ?>
</table>