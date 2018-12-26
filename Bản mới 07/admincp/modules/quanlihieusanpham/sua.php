<?php
    $sql="select * from nhasanxuat where ID=$_GET[id]";
    $run=mysqli_query($conn,$sql);
    $dong=mysqli_fetch_array($run);
?>
<form action="modules/quanlihieusanpham/xuly.php?id=<?php echo $dong['ID'] ?>" method="post" enctype="multipart/form-data">
<table width="100%" border="1">
    <tr>
        <td colspan="2"><div align="center">Sửa loại sản phẩm</div></td>
    </tr>
    <tr>
        <td>ID</td>
        <td><input type="text" name="ID" value=<?php echo $dong['ID'] ?>></td>
    </tr>
    <tr>
        <td>Tên loại sản phẩm</td>
        <td><input type="text" name="Ten" value=<?php echo $dong['Ten'] ?>></td>
    </tr>
    
    <tr>
        <td colspan="2"><div align="center"><input type="submit" name="sua" id="sua" value="Sửa"></div></td>
    </tr>
</table>
</form>