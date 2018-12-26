<?php
    include('../../../config.php');
    $id=$_GET['id'];
    $Ten=$_POST['Ten'];
    $ID=$_POST['ID'];
    if(isset($_POST['them']))
    {
        //them
        $sql="insert into danhmuc (ID ,Ten ) values ('$ID','$Ten');";
        mysqli_query($conn,$sql);
        header('location:../../index.php?quanli=quanliloaisanpham&ac=them');
    }
    elseif(isset($_POST['sua']))
    {
        //sua
        $sql="update danhmuc set ID='$ID',Ten='$Ten' where ID='$id'";
        mysqli_query($conn,$sql);
        header('location:../../index.php?quanli=quanliloaisanpham&ac=sua&id='.$id);
    }
    else
    {
        //xoa
        $sql="delete from danhmuc where ID='$id'";
        mysqli_query($conn,$sql);
        header('location:../../index.php?quanli=quanliloaisanpham&ac=them');
    }
?>