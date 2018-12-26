<?php
    include('../../../config.php');
    $id=$_GET['ID'];
    $MaSP=$_POST['masp'];
    $TenSP=$_POST['tensp'];
    $LoaiSP=$_POST['loaisp'];
    $NhaSanXuatID=$_POST['nsx'];
    $XuatXu=$_POST['xuatxu'];
    $MoTa=$_POST['mota'];
    $NgayTao=$_POST['ngaytao'];
    $SoLuong=$_POST['soluong'];
    $HinhAnh=$_FILES['hinhanh']['name'];
    $HinhAnh_tmp=$_FILES['hinhanh']['tmp_name'];
    move_uploaded_file($HinhAnh_tmp,'../../../images/san_pham/'.$HinhAnh);
    $Gia=$_POST['gia'];
    $GiaGoc=$_POST['giagoc'];
    $LuotXem=$_POST['luotxem'];
    $TinhTrang=$_POST['tinhtrang'];
    if(isset($_POST['them']))
    {
        //them
        $sql="insert into sanpham (MaSP,TenSP,LoaiSP,NhaSanXuatID,XuatXu,MoTa,NgayTao,SoLuong,HinhAnh,Gia,GiaGoc,LuotXem,TinhTrang ) 
        values ('$MaSP','$TenSP','$LoaiSP','$NhaSanXuatID','$XuatXu','$MoTa','$NgayTao','$SoLuong','$HinhAnh','$Gia','$GiaGoc','$LuotXem','$TinhTrang');";
        mysqli_query($conn,$sql);
        header('location:../../index.php?quanli=quanlisanpham&ac=them');
    }
    elseif(isset($_POST['sua']))
    {
        //sua
        if($HinhAnh!=''){
        $sql="update sanpham set MaSP='$MaSP',TenSP='$TenSP',LoaiSP='$LoaiSP',NhaSanXuatID='$NhaSanXuatID',
        XuatXu='$XuatXu',MoTa='$MoTa',NgayTao='$NgayTao',SoLuong='$SoLuong',HinhAnh='$HinhAnh',Gia='$Gia',GiaGoc='$GiaGoc',LuotXem='$LuotXem',TinhTrang='$TinhTrang' where MaSP='$MaSP'";
        }else{
        $sql="update sanpham set MaSP='$MaSP',TenSP='$TenSP',LoaiSP='$LoaiSP',NhaSanXuatID='$NhaSanXuatID',
        XuatXu='$XuatXu',MoTa='$MoTa',NgayTao='$NgayTao',SoLuong='$SoLuong',Gia='$Gia',GiaGoc='$GiaGoc',LuotXem='$LuotXem',TinhTrang='$TinhTrang' where MaSP='$MaSP'";
        }
        mysqli_query($conn,$sql);
        header('location:../../index.php?quanli=quanlisanpham&ac=sua&id='.$MaSP);
    }
    else
    {
        //xoa
        $sql="delete from sanpham where ID='$id'";
        mysqli_query($conn,$sql);
        header('location:../../index.php?quanli=quanlisanpham&ac=them');
    }
?>