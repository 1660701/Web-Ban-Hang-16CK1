<?php
    include('../../../config.php');
    $id=$_GET['id'];
    $Ten=$_POST['Ten'];
    $ID=$_POST['ID'];
    if(isset($_POST['them']))
    {
        //them
        $sql="insert into nhasanxuat (ID,Ten) values ('$ID','$Ten');";
        mysqli_query($conn,$sql);
        header('location:../../index.php?quanli=quanlihieusanpham&ac=them');
    }
    elseif(isset($_POST['sua']))
    {
        //sua
        $sql="update nhasanxuat set ID='$ID',Ten='$Ten' where ID='$id'";
        mysqli_query($conn,$sql);
        header('location:../../index.php?quanli=quanlihieusanpham&ac=sua&id='.$id);
    }
    else
    {
        //xoa
        $sql="delete from nhasanxuat where ID='$id'";
        mysqli_query($conn,$sql);
        header('location:../../index.php?quanli=quanlihieusanpham&ac=them');
    }
?>