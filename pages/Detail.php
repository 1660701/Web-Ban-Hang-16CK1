<html>
<?php
    $query = "select * from sanpham where sanpham.Id = ??"

    $qery5cungloai = "select top 5 from sanpham where loaisanpham = $query.loaisanpham"
?>
<div>
    <img>
    <p><?php $query.Giaban ?></p>
    <p><?php $query.luotxem ?></p>
    <p><?php $query.luotxem ?></p>
    <p><?php $query.luotxem ?></p>

    <div>
        <?php
            while($qery5cungloai){
                '        <img>
                <p>Ten san pham</p>
                <img>
                <p>Ten san pham</p><img>
                <p>Ten san pham</p><img>
                <p>Ten san pham</p><img>
                <p>Ten san pham</p>'
            }
        ?>

    </div>
    <div>
        <img>
        <p>Ten san pham</p>
        <img>
        <p>Ten san pham</p><img>
        <p>Ten san pham</p><img>
        <p>Ten san pham</p><img>
        <p>Ten san pham</p>
    </div>
</div>
</html>