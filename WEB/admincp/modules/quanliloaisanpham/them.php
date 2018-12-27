<!-- form đăng nhập, sau khi xong sẽ bay đến trang xuly.php -->
<form action="modules/quanliloaisanpham/xuly.php" method="post" enctype="multipart/form-data">
<table width="100%" border="1">
    <tr>
        <td colspan="2"><div align="center">Thêm loại sản phẩm</div></td>
    </tr>

    <tr>
        <td>ID</td>
        <td><input type="text" name="ID"></td>
    </tr>
    <tr>
        <td>Tên loại sản phẩm</td>
        <td><input type="text" name="Ten"></td>
    </tr>
    
    <tr>
        <td colspan="2"><div align="center"><input class="buttonmuahang" type="submit" name="them" id="them" value="Thêm"></div></td>
    </tr>
</table>
</form>