<?php
    $sql="select * from hieusp where id_hieusp=$_GET[id]";
    $run=mysqli_query($conn,$sql);
    $dong=mysqli_fetch_array($run);
?>
<form action="modules/quanlihieusanpham/xuly.php?id=<?php echo $dong['id_hieusp'] ?>" method="post" enctype="multipart/form-data">
<table width="100%" border="1">
    <tr>
        <td colspan="2"><div align="center">Sửa loại sản phẩm</div></td>
    </tr>
    <tr>
        <td>Tên loại sản phẩm</td>
        <td><input type="text" name="tenhieusanpham" value=<?php echo $dong['tenhieusanpham'] ?>></td>
    </tr>
    <tr>
        <td>Thứ tự</td>
        <td><input type="text" name="thutu" value=<?php echo $dong['thutuhieusanpham'] ?>></td>
    </tr>
    <tr>
        <td colspan="2"><div align="center"><input type="submit" name="sua" id="sua" value="Sửa"></div></td>
    </tr>
</table>
</form>