<?php 

class SanPham
{
    protected $_conn = null;

    function __construct($conn)
    {
        $this->_conn = $conn;
    }
//TAT CA SAN PHAM
    public function TatCaSanPham()
    {

        $sql = "select * from SanPham order by NgayTao desc";
        
        $run =mysqli_query($this->_conn, $sql);

        $result = [];
        while($row = mysqli_fetch_array($run))
        {
            array_push($result, $row);
        }

        return $result;
    }
    public function drawTatCaSanPham($sanpham)
    {
        $hinhanh=$this->HinhAnh($sanpham['MaSP']);
        $html =<<<SANPHAM
        <li>
            <a href="index.php?xem=chitietsanpham&id=$sanpham[MaSP]">
            <img src=$hinhanh width='100px' height='150px'>
            <p>$sanpham[TenSP]</p>
            <p style="color:#F00;"><del>$sanpham[GiaGoc]</del></p>
            <p style="color:#F00;">$sanpham[Gia]</p>
            <p style="color:#F00;text-align:center">Chi tiết</p>
            </a>
        </li>       
            
SANPHAM;
        return $html;
    }
    public function drawTatCaSanPhamHeader() 
    {
    $html =<<<SANPHAMH
    <p style="text-align:center;color:red;background:#0CF;padding:10px">Tất cả sản phẩm</p>
        <div class="sanphamall">
            <ul>
SANPHAMH;
    return $html;
    }

public function drawTatCaSanPhamFooter() 
    {
    $html =<<<SANPHAMF
     </ul> 
    </div>
SANPHAMF;
    return $html;
    }
    // SAN PHAM CUNG LOAI
    public function SanPhamCungLoai($id_sanpham)
    {

        $sql = "select * from SanPham where LoaiSP = ".$id_sanpham;
        
        $run =mysqli_query($this->_conn, $sql);

        $result = [];
        while($row = mysqli_fetch_array($run))
        {
            array_push($result, $row);
        }

        return $result;
    }

    public function drawSanPhamCungLoai($sanpham)
    {
        $hinhanh=$this->HinhAnh($sanpham['MaSP']);
        $html =<<<SANPHAM
        <li>
            <a href="index.php?xem=chitietsanpham&id=$sanpham[MaSP]">
            <img src=$hinhanh width='100px' height='150px'>
            <p>$sanpham[TenSP]</p>
            <p style="color:#F00;"><del>$sanpham[GiaGoc]</del></p>
            <p style="color:#F00;">$sanpham[Gia]</p>
            <p style="color:#F00;text-align:center">Chi tiết</p>
            </a>
        </li>       
            
SANPHAM;

        return $html;
    }

    public function drawSPCungLoaiHeader() 
    {
        $html =<<<SANPHAMH
        <p style="text-align:center;color:red;background:#0CF;padding:10px">Sản phẩm cùng loại</p>
            <div class="sanphamall">
                <ul>
SANPHAMH;
        return $html;
    }

    public function drawSPCungLoaiFooter() 
    {
        $html =<<<SANPHAMF
         </ul> 
        </div>
SANPHAMF;
        return $html;
    }


    // CHI TIET SAN PHAM
    public function ChiTietSanPham($id_sanpham)
    {
        $sql = "select * from sanpham where MaSP = '$id_sanpham'";
        
        $run =mysqli_query($this->_conn, $sql);

        $result = mysqli_fetch_array($run);

        return $result;
    }

    public function drawChiTiestSPHeader() 
    {
        $html =<<<SANPHAMH
        <p style="text-align:center;color:red;background:#0CF;padding:10px">Chi tiết sản phẩm</p>
            <div class="sanphamall">
                <ul>
SANPHAMH;
        return $html;
    }
    public function drawChiTietSPFooter() 
    {
        $html =<<<SANPHAMF
         </ul> 
        </div>
SANPHAMF;
        return $html;
    }
    public function HinhAnh($id_sanpham)
    {
        $sql="select HinhAnh from sanpham where MaSP='$id_sanpham'";
        $run=mysqli_query($this->_conn,$sql);
        $row=mysqli_fetch_array($run);
        $images="images/san_pham/".$row['HinhAnh'];
        return $images;
    }
    public function TimLoaiSP($loaisp)
    {
        $sql="select Ten from danhmuc d,sanpham s where d.ID = s.LoaiSP and s.LoaiSP=".$loaisp;
        $run=mysqli_query($this->_conn,$sql);
        $row = mysqli_fetch_array($run);
        return $row;
    }
    public function TimNSX($nsx)
    {
        $sql="select Ten from nhasanxuat n,sanpham s where n.ID=s.NhaSanXuatID and s.NhaSanXuatID=".$nsx;
        $run=mysqli_query($this->_conn,$sql);
        $row=mysqli_fetch_array($run);
        return $row;
    }
    public function drawChiTietSP($sanpham)
    {   $loaiSP=$this->TimLoaiSP($sanpham['LoaiSP']);
        $nsx=$this->TimNSX($sanpham['NhaSanXuatID']);
        $hinhanh=$this->HinhAnh($sanpham['MaSP']);

        $html =<<<SANPHAM
        <li>
        <p>
            <p><img src=$hinhanh width='150px'></p>
            <p>Tên sản phẩm: $sanpham[TenSP]</p>
            <p>Loại sản phẩm:  $loaiSP[Ten]</p>
            <p>Nhà sản xuất: $nsx[Ten]</p>
            <p>Xuất Xứ: $sanpham[XuatXu]</p>
            <p>Mô tả: $sanpham[MoTa]</p>
            <p>Số lượng còn: $sanpham[SoLuong]</p>
            <p>Giá sản phẩm: $sanpham[Gia]</p>
            Giá gốc: <del><p>$sanpham[GiaGoc]</p></del>
            <p>Số lượt xem: $sanpham[LuotXem]</p>
            <p>Tình trạng: $sanpham[TinhTrang]</p>

        <li>         
SANPHAM;
        
        return $html;
    }

// SAN PHAM CUNG NSX
public function SanPhamCungNSX($id_sanpham)
{

    $sql = "select * from SanPham where NhaSanXuatID = ".$id_sanpham;
    
    $run =mysqli_query($this->_conn, $sql);

    $result = [];
    while($row = mysqli_fetch_array($run))
    {
        array_push($result, $row);
    }

    return $result;
}

public function drawSanPhamCungNSX($sanpham)
{
    $hinhanh=$this->HinhAnh($sanpham['MaSP']);
    $html =<<<SANPHAM
    <li>
        <a href="index.php?xem=chitietsanpham&id=$sanpham[MaSP]">
        <img src=$hinhanh width='100px' height='150px'>
        <p>$sanpham[TenSP]</p>
        <p style="color:#F00;"><del>$sanpham[GiaGoc]</del></p>
        <p style="color:#F00;">$sanpham[Gia]</p>
        <p style="color:#F00;text-align:center">Chi tiết</p>
        </a>
    </li>       
        
SANPHAM;

    return $html;
}

public function drawSPCungNSXHeader() 
{
    $html =<<<SANPHAMH
    <p style="text-align:center;color:red;background:#0CF;padding:10px">Sản phẩm cùng loại</p>
        <div class="sanphamall">
            <ul>
SANPHAMH;
    return $html;
}

public function drawSPCungNSXFooter() 
{
    $html =<<<SANPHAMF
     </ul> 
    </div>
SANPHAMF;
    return $html;
}
//Top 10 sản phẩm mới (top10new)
public function Top10New()
{

    $sql = "select * from SanPham order by NgayTao desc limit 10";
    
    $run =mysqli_query($this->_conn, $sql);

    $result = [];
    while($row = mysqli_fetch_array($run))
    {
        array_push($result, $row);
    }

    return $result;
}
public function drawTop10New($sanpham)
{
    $hinhanh=$this->HinhAnh($sanpham['MaSP']);
    
    $html =<<<SANPHAM
    <li>
        <a href="index.php?xem=chitietsanpham&id=$sanpham[MaSP]">
        <img src=$hinhanh width='100px' height='150px'>
        <p>$sanpham[TenSP]</p>
        <p style="color:#F00;"><del>$sanpham[GiaGoc]</del></p>
        <p style="color:#F00;">$sanpham[Gia]</p>
        <p style="color:#F00;text-align:center">Chi tiết</p>
        </a>
    </li>       
        
SANPHAM;
    return $html;
}
public function drawTop10NewHeader() 
{
$html =<<<SANPHAMH
<p style="text-align:center;color:red;background:#0CF;padding:10px">Tất cả sản phẩm</p>
    <div class="sanphamall">
        <ul>
SANPHAMH;
return $html;
}

public function drawTop10NewFooter() 
{
$html =<<<SANPHAMF
 </ul> 
</div>
SANPHAMF;
return $html;
}

//Top 10 sản phẩm bán chạy (top10selling)
public function Top10NSelling()
{

    $sql = "select * from SanPham order by SoLuong desc limit 10";
    
    $run =mysqli_query($this->_conn, $sql);

    $result = [];
    while($row = mysqli_fetch_array($run))
    {
        array_push($result, $row);
    }

    return $result;
}
public function drawTop10NSelling($sanpham)
{
    $hinhanh=$this->HinhAnh($sanpham['MaSP']);
    
    $html =<<<SANPHAM
    <li>
        <a href="index.php?xem=chitietsanpham&id=$sanpham[MaSP]">
        <img src=$hinhanh width='100px' height='150px'>
        <p>$sanpham[TenSP]</p>
        <p style="color:#F00;"><del>$sanpham[GiaGoc]</del></p>
        <p style="color:#F00;">$sanpham[Gia]</p>
        <p style="color:#F00;text-align:center">Chi tiết</p>
        </a>
    </li>       
        
SANPHAM;
    return $html;
}
public function drawTop10NSellingHeader() 
{
$html =<<<SANPHAMH
<p style="text-align:center;color:red;background:#0CF;padding:10px">Tất cả sản phẩm</p>
    <div class="sanphamall">
        <ul>
SANPHAMH;
return $html;
}

public function drawTop10NSellingFooter() 
{
$html =<<<SANPHAMF
 </ul> 
</div>
SANPHAMF;
return $html;
}

//Top 10 sản phẩm xem nhiều nhất (top10view)
public function Top10View()
{

    $sql = "select * from SanPham order by LuotXem desc limit 10";
    
    $run =mysqli_query($this->_conn, $sql);

    $result = [];
    while($row = mysqli_fetch_array($run))
    {
        array_push($result, $row);
    }

    return $result;
}
public function drawTop10View($sanpham)
{
    $hinhanh=$this->HinhAnh($sanpham['MaSP']);
    
    $html =<<<SANPHAM
    <li>
        <a href="index.php?xem=chitietsanpham&id=$sanpham[MaSP]">
        <img src=$hinhanh width='100px' height='150px'>
        <p>$sanpham[TenSP]</p>
        <p style="color:#F00;"><del>$sanpham[GiaGoc]</del></p>
        <p style="color:#F00;">$sanpham[Gia]</p>
        <p style="color:#F00;text-align:center">Chi tiết</p>
        </a>
    </li>       
        
SANPHAM;
    return $html;
}
public function drawTop10ViewHeader() 
{
$html =<<<SANPHAMH
<p style="text-align:center;color:red;background:#0CF;padding:10px">Tất cả sản phẩm</p>
    <div class="sanphamall">
        <ul>
SANPHAMH;
return $html;
}

public function drawTop10ViewFooter() 
{
$html =<<<SANPHAMF
 </ul> 
</div>
SANPHAMF;
return $html;
}
}