
<?php
    $sql="select * from sanpham order by ID desc";
    $run=mysqli_query($conn,$sql);
?>
<table width="100%" border="1">
    <tr>
        <td>Hình ảnh</td>
        <td>Mã sản phẩm</td>
        <td>Tên sản phẩm</td>
        <td>Loại sản phẩm</td>
        <td>Nhà sản xuất</td>
        <td>Xuất xứ</td>
        <td>Mô tả</td>
        <td>Ngày tạo</td>
        <td>Số lượng</td>
        <td>Giá</td>
        <td>Giá gốc</td>
        <td>Lượt xem</td>
        <td>Tình trạng</td>
        <td colspan="2"><b>Quản lí<b></td>
        <td></td>
    </tr>
    <?php
        while($dong=mysqli_fetch_array($run))
        {
            
    ?>
    <tr>
        <td><img src="images/san_pham/<?php echo $dong['HinhAnh']?>" width='60'></td>
        <td><?php echo $dong['MaSP'] ?></td>
        <td><?php echo $dong['TenSP'] ?></td>
        <td><?php echo $dong['LoaiSP'] ?></td>
        <td><?php echo $dong['NhaSanXuatID'] ?></td>
        <td><?php echo $dong['XuatXu'] ?></td>
        <td><?php echo $dong['MoTa'] ?></td>
        <td><?php echo $dong['NgayTao'] ?></td>
        <td><?php echo $dong['SoLuong'] ?></td>
        <td><?php echo $dong['Gia'] ?></td>
        <td><?php echo $dong['GiaGoc'] ?></td>
        <td><?php echo $dong['LuotXem'] ?></td>
        <td><?php echo $dong['TinhTrang'] ?></td>
        <td><a href="index.php?quanli=quanlisanpham&ac=sua&id=<?php echo $dong['MaSP']?>">Sửa</a></td>
        <td><a href="modules/quanlisanpham/xuly.php?id=<?php echo $dong['ID'] ?>">Xóa</a></td>
    </tr>
    <?php
        }
    ?>
</table>