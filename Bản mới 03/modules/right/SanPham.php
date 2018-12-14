<?php 

class SanPham
{
    protected $_conn = null;

    function __construct($conn)
    {
        $this->_conn = $conn;
    }

    public function TatCaSanPham()
    {

        $sql = "select * from SanPham order by ID desc";
        
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
        $html =<<<SANPHAM
        <li>
            <a href="index.php?xem=chitietsanpham&id=$sanpham[MaSP]">
            <img src="images/san_pham/10.jpg" width="100" height="100">
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
        $html =<<<SANPHAM
        <li>
            <a href="index.php?xem=chitietsanpham&id=$sanpham[MaSP]">
            <img src="images/san_pham/10.jpg" width="100" height="100">
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
    public function TimLoaiSP($loaisp)
    {
        $sql="select Ten from danhmuc d,sanpham s where s.LoaiSP=".$loaisp;
        $loai=mysqli_query($this->_conn,$sql);
        return $loai;
    }
    public function TimNSX($nsx)
    {
        $sql="select Ten from nhasanxuat n,sanpham s where s.NhaSanXuatID=".$nsx;
        $hang=mysqli_query($this->conn,$sql);
        return $hang;
    }
    public function drawChiTietSP($sanpham)
    {   //$loaiSP=$this->TimLoaiSP($sanpham['LoaiSP']);
        $html =<<<SANPHAM
        <li>
        <p>
            
            <p>Tên sản phẩm: $sanpham[TenSP]</p>
            <p>Loại sản phẩm: $sanpham[LoaiSP] </p>
            <p>Nhà sản xuất: $sanpham[NhaSanXuatID]</p>
            <p>Xuất Xứ: $sanpham[XuatXu]</p>
            <p>Mô tả: $sanpham[MoTa]</p>
            <p>Số lượng còn: $sanpham[SoLuong]</p>
            <p>Hình ảnh: $sanpham[HinhAnh]</p>
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
    

    $html =<<<SANPHAM
    <li>
        <a href="index.php?xem=chitietsanpham&id=$sanpham[MaSP]">
        <img src="images/san_pham/10.jpg" width="100" height="100">
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
}