<?php
    include('../config.php');
    $id=$_GET['id'];
    $tenloaisp=$_POST['tenloaisanpham'];
    $thutu=$_POST['thutu'];
    if(isset($_POST['them']))
    {
        //them
        $sql="insert into loaisp (tenloaisp ,thutu ) values ('$tenloaisp','$thutu');";
        mysqli_query($conn,$sql);
        header('location:../../index.php?quanli=quanliloaisanpham&ac=them');
    }
    elseif(isset($_POST['sua']))
    {
        //sua
        $sql="update loaisp set tenloaisp='$tenloaisp',thutu='$thutu' where id_loaisp='$id'";
        mysqli_query($conn,$sql);
        header('location:../../index.php?quanli=quanliloaisanpham&ac=sua&id='.$id);
    }
    else
    {
        //xoa
        $sql="delete from loaisp where id_loaisp='$id'";
        mysqli_query($conn,$sql);
        header('location:../../index.php?quanli=quanliloaisanpham&ac=them');
    }
?>