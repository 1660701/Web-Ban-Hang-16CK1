<?php
class NguoiDung
{
    protected $_conn = null;

    function __construct($conn)
    {
        $this->_conn = $conn;
}
public function TTND($id_nguoidung)
{
    $sql="select * from nguoidung where ID=".$id_nguoidung;
    $run =mysqli_query($this->_conn, $sql);

    $result = [];
    while($row = mysqli_fetch_array($run))
    {
        array_push($result, $row);
    }

    return $result;
}
public function HinhAnh($id_nguoidung)
    {
        $sql="select HinhAnh from nguoidung where MaSP='$id_sanpham'";
        $run=mysqli_query($this->_conn,$sql);
        $row=mysqli_fetch_array($run);
        $images="images/avt/".$row['HinhAnh'];
        return $images;
    }
public function drawTTND($nguoidung)
    {
        $hinhanh=$this->HinhAnh($nguoidung['ID']);
        $html =<<<SANPHAM
        <li>
            <a href="index.php?xem=chitietsanpham&id=$nguoidung[ID]">
            <img src=$hinhanh width='100px' height='150px'>
            <p>$nguoidung[UserName]</p>
            <p>$nguoidung[SoDienThoai]</p>
            <p>$nguoidung[DiaChi]</p>
            <p>$nguoidung[Email]</p>
            <p>$nguoidung[Quyen]</p>
            <p>$nguoidung[GhiChu]</p>
            </a>
        </li>       
            
SANPHAM;
        return $html;
    }
    public function drawTTNDHeader() 
    {
    $html =<<<SANPHAMH
    <p style="text-align:center;color:red;background:#0CF;padding:10px">Thông tin người dùng</p>
        <div class="sanphamall">
            <ul>
SANPHAMH;
    return $html;
    }

public function drawTTNDFooter() 
    {
    $html =<<<SANPHAMF
     </ul> 
    </div>
SANPHAMF;
    return $html;
    }
}
?>