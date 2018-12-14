<?php
    include('../config.php');
    $id=$_GET['id'];
    $tenhieusp=$_POST['tenhieusanpham'];
    $thutu=$_POST['thutuhieusp'];
    if(isset($_POST['them']))
    {
        //them
        $sql="insert into hieusp (tenhieusanpham,thutuhieusp) values ('$tenhieusp','$thutu');";
        mysqli_query($conn,$sql);
        header('location:../../index.php?quanli=quanlihieusanpham&ac=them');
    }
    elseif(isset($_POST['sua']))
    {
        //sua
        $sql="update hieusp set tenhieusanpham='$tenhieusp',thutuhieusp='$thutu' where id_hieusp='$id'";
        mysqli_query($conn,$sql);
        header('location:../../index.php?quanli=quanlihieusanpham&ac=sua&id='.$id);
    }
    else
    {
        //xoa
        $sql="delete from hieusp where id_hieusp='$id'";
        mysqli_query($conn,$sql);
        header('location:../../index.php?quanli=quanlihieusanpham&ac=them');
    }
?>