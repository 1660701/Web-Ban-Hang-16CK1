<?php 
//Tạo class để giữ tất cả các hàm, còn công dụng chi tiết thì không rõ
class SanPham
{
    protected $_conn = null;

    function __construct($conn)
    {
        $this->_conn = $conn;
    }
//hàm này để lấy dữ liệu ra vì không cần tiêu chí nào nên ta không cần truyền biến vào
    public function TatCaSanPham()
    {

        $sql = "select * from SanPham order by ID desc";
        
        $run =mysqli_query($this->_conn, $sql);
        //$result là tạo 1 mảng để chưa các giá trị
        $result = [];
        while($row = mysqli_fetch_array($run))
        {
            //Cho giá trị dòng $row vào cái mảng đã tạo lúc nãy
            array_push($result, $row);
        }
        //hàm thì phải có return
        return $result;
    }
    //hàm vẽ lại cái đã lấy ở phía trên
    public function drawTatCaSanPham($sanpham)
    {
        //hàm xử lí hình ảnh nó nằm phía dưới
        $hinhanh=$this->HinhAnh($sanpham['MaSP']);
        //code trong cặp lệnh này sẽ là code html (html in php)
        $html =<<<SANPHAM
        <li>
            <a href="index.php?xem=chitietsanpham&id=$sanpham[MaSP]">
            <img src=$hinhanh width='100px' height='150px'>
            <p class="Ten">$sanpham[TenSP]</p>
            <p style="color:#F00;"><del>$sanpham[GiaGoc] VNĐ</del></p>
            <p style="color:#F00;">$sanpham[Gia] VNĐ</p>
            <p style="color:#4CAF50;text-align:center">Chi tiết</p>
            <a href="index.php?xem=giohang&id=$sanpham[MaSP]"><input class="buttonmuahang" type="submit" name="giohang" id="giohang" value="Mua hàng" /></a>
            </a>
        </li>       
            
SANPHAM;
        return $html;
    }
    //2 hàm ít quan trọng là header và footer
    public function drawTatCaSanPhamHeader() 
    {
    $html =<<<SANPHAMH
    <p style="text-align:center;color:white;background:#4CAF50;padding:10px">Tất cả sản phẩm</p>
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
    // Lấy dữ liệu từ CSDL vì tìm kiếm theo loại SP nên ta sẽ truyền biến vào cho nó
    public function SanPhamCungLoai($id_sanpham)
    {

        $sql = "select * from SanPham where LoaiSP = ".$id_sanpham;
        
        $run =mysqli_query($this->_conn, $sql);
        //này là tọa mảng chưa dữ liệu, nghĩ vậy :D
        $result = [];
        while($row = mysqli_fetch_array($run))
        {
            array_push($result, $row);
        }

        return $result;
    }
    //hàm vẽ lại dữ liệu đã lấy ở trên
    public function drawSanPhamCungLoai($sanpham)
    {
        $hinhanh=$this->HinhAnh($sanpham['MaSP']);
        $html =<<<SANPHAM
        <li>
            <a href="index.php?xem=chitietsanpham&id=$sanpham[MaSP]">
            <img src=$hinhanh width='100px' height='150px'>
            <p class="Ten">$sanpham[TenSP]</p>
            <p style="color:#F00;"><del>$sanpham[GiaGoc] VNĐ</del></p>
            <p style="color:#F00;">$sanpham[Gia] VNĐ</p>
            <p style="color:#4CAF50;text-align:center">Chi tiết</p>
            <a href="index.php?xem=giohang&id=$sanpham[MaSP]"><input class="buttonmuahang" type="submit" name="giohang" id="giohang" value="Mua hàng" /></a>
            </a>
        </li>       
            
SANPHAM;

        return $html;
    }

    public function drawSPCungLoaiHeader() 
    {
        $html =<<<SANPHAMH
        <p style="text-align:center;color:white;background:#4CAF50;padding:10px">Sản phẩm cùng loại</p>
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


    // Giống mấy cái ở trên 1 hàm lấy dữ liệu 1 hàm vẽ dữ liệu, 2 hàm header và footer
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
        <p style="text-align:center;color:white;background:#4CAF50;padding:10px">Chi tiết sản phẩm</p>
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
    //hàm xử lí để lấy được hình ảnh xuất ra
    public function HinhAnh($id_sanpham)
    {
        $sql="select HinhAnh from sanpham where MaSP='$id_sanpham'";
        $run=mysqli_query($this->_conn,$sql);
        $row=mysqli_fetch_array($run);
        $images="images/san_pham/".$row['HinhAnh'];
        return $images;
    }
    //hàm dựa vào id loại sp để xuất ra tên loại sản phẩm từ 2 bảng khác nhau
    public function TimLoaiSP($loaisp)
    {
        $sql="select Ten from danhmuc d,sanpham s where d.ID = s.LoaiSP and s.LoaiSP=".$loaisp;
        $run=mysqli_query($this->_conn,$sql);
        $row = mysqli_fetch_array($run);
        return $row;
    }
    //giống như tìm loại sp vậy đó
    public function TimNSX($nsx)
    {
        $sql="select Ten from nhasanxuat n,sanpham s where n.ID=s.NhaSanXuatID and s.NhaSanXuatID=".$nsx;
        $run=mysqli_query($this->_conn,$sql);
        $row=mysqli_fetch_array($run);
        return $row;
    }
    //hàm xuất ra tình trạng theo số đã nhập vào
    public function KTTinhTrang($tinhtrang)
    {
            if($tinhtrang==1)
            {
                $kq='Còn hàng';
            } 
            else{
               $kq='Hết hàng';
            }
            return $kq;
    }
    //Hàm tăng số lượng xem khi người dùng vào phần chi tiết sản phẩm
    public function SLSP($tangslsp)
    {
        $tangslsp=$tangslsp+1;
        $sql=mysqli_query($this->_conn,"update sanpham set LuotXem='$tangslsp' where MaSP='$_GET[id]'");
        return $tangslsp;
    }
    public function drawChiTietSP($sanpham)
    {   //Gán dữ liệu vào các biến để dễ dàng gọi lại
        $loaiSP=$this->TimLoaiSP($sanpham['LoaiSP']);
        $nsx=$this->TimNSX($sanpham['NhaSanXuatID']);
        $hinhanh=$this->HinhAnh($sanpham['MaSP']);
        $tt=$this->KTTinhTrang($sanpham['TinhTrang']);
        $slsp=$this->SLSP($sanpham['LuotXem']);

        $html =<<<SANPHAM
        <li>
        <p>
            <p><img src=$hinhanh width='150px'></p>
            <p class="Ten">Tên sản phẩm: $sanpham[TenSP]</p>
            <p>Loại sản phẩm:  $loaiSP[Ten]</p>
            <p>Nhà sản xuất: $nsx[Ten]</p>
            <p>Xuất Xứ: $sanpham[XuatXu]</p>
            <p>Mô tả: $sanpham[MoTa]</p>
            <p>Số lượng còn: $sanpham[SoLuong]</p>
            <del><p style="color:#F00;">Giá gốc:<del>$sanpham[GiaGoc] VNĐ</p></del>
            <p style="color:#F00;">Giá sản phẩm: $sanpham[Gia] VNĐ</p>
            <p>Số lượt xem: $slsp</p>
            <p>Tình trạng: $tt</p>
            <a href="index.php?xem=giohang&id=$sanpham[MaSP]"><input class="buttonmuahang" type="submit" name="giohang" id="giohang" value="Mua hàng" /></a>
        <li>         
SANPHAM;
        
        return $html;
    }

// Giống mấy cái ở trên 1 hàm lấy dữ liệu 1 hàm vẽ dữ liệu, 2 hàm header và footer
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
        <p class="Ten">$sanpham[TenSP]</p>
        <p style="color:#F00;"><del>$sanpham[GiaGoc]</del></p>
        <p style="color:#F00;">$sanpham[Gia]</p>
        <p style="color:#4CAF50;text-align:center">Chi tiết</p>
        <a href="index.php?xem=giohang&id=$sanpham[MaSP]"><input class="buttonmuahang" type="submit" name="giohang" id="giohang" value="Mua hàng" /></a>
        </a>
    </li>       
        
SANPHAM;

    return $html;
}

public function drawSPCungNSXHeader() 
{
    $html =<<<SANPHAMH
    <p style="text-align:center;color:white;background:#4CAF50;padding:10px">Sản phẩm cùng loại</p>
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
// Giống mấy cái ở trên 1 hàm lấy dữ liệu 1 hàm vẽ dữ liệu, 2 hàm header và footer
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
        <p class="Ten">$sanpham[TenSP]</p>
        <p style="color:#F00;"><del>$sanpham[GiaGoc]</del></p>
        <p style="color:#F00;">$sanpham[Gia]</p>
        <p style="color:#4CAF50;text-align:center">Chi tiết</p>
        <a href="index.php?xem=giohang&id=$sanpham[MaSP]"><input class="buttonmuahang" type="submit" name="giohang" id="giohang" value="Mua hàng" /></a>
        </a>
    </li>       
        
SANPHAM;

    return $html;
}
public function drawTop10NewHeader() 
{
$html =<<<SANPHAMH
<p style="text-align:center;color:white;background:#4CAF50;padding:10px">Tất cả sản phẩm</p>
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
// Giống mấy cái ở trên 1 hàm lấy dữ liệu 1 hàm vẽ dữ liệu, 2 hàm header và footer
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
        <p class="Ten">$sanpham[TenSP]</p>
        <p style="color:#F00;"><del>$sanpham[GiaGoc]</del></p>
        <p style="color:#F00;">$sanpham[Gia]</p>
        <p style="color:#4CAF50;text-align:center">Chi tiết</p>
        <a href="index.php?xem=giohang&id=$sanpham[MaSP]"><input class="buttonmuahang" type="submit" name="giohang" id="giohang" value="Mua hàng" /></a>
        </a>
    </li>       
        
SANPHAM;
    return $html;
}
public function drawTop10NSellingHeader() 
{
$html =<<<SANPHAMH
<p style="text-align:center;color:white;background:#4CAF50;padding:10px">Tất cả sản phẩm</p>
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
// Giống mấy cái ở trên 1 hàm lấy dữ liệu 1 hàm vẽ dữ liệu, 2 hàm header và footer
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
        <p class="Ten">$sanpham[TenSP]</p>
        <p style="color:#F00;"><del>$sanpham[GiaGoc]</del></p>
        <p style="color:#F00;">$sanpham[Gia]</p>
        <p style="color:#4CAF50;text-align:center">Chi tiết</p>
        <a href="index.php?xem=giohang&id=$sanpham[MaSP]"><input class="buttonmuahang" type="submit" name="giohang" id="giohang" value="Mua hàng" /></a>
        </a>
    </li>       
        
SANPHAM;
    return $html;
}
public function drawTop10ViewHeader() 
{
$html =<<<SANPHAMH
<p style="text-align:center;color:white;background:#4CAF50;padding:10px">Tất cả sản phẩm</p>
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
// Giống mấy cái ở trên 1 hàm lấy dữ liệu 1 hàm vẽ dữ liệu, 2 hàm header và footer
//Top 5 sản phẩm cùng loại
public function NamSanPhamCungLoai($id_sanpham)
    {
        $spcl=$this->NhungSanPhamCungLoai($id_sanpham);

        $sql = "select * from SanPham where LoaiSP ='$spcl[LoaiSP]' and MaSP<>'$id_sanpham' limit 5";
        
        $run =mysqli_query($this->_conn, $sql);

        $result = [];
        while($row = mysqli_fetch_array($run))
        {
            array_push($result, $row);
        }

        return $result;
    }
    public function drawNamSanPhamCungLoai($sanpham)
    {
        $hinhanh=$this->HinhAnh($sanpham['MaSP']);
        $html =<<<SANPHAM
        <li>
            <a href="index.php?xem=chitietsanpham&id=$sanpham[MaSP]">
            <img src=$hinhanh width='100px' height='150px'>
            <p class="Ten">$sanpham[TenSP]</p>
            <p style="color:#F00;"><del>$sanpham[GiaGoc]</del></p>
            <p style="color:#F00;">$sanpham[Gia]</p>
            <p style="color:#4CAF50;text-align:center">Chi tiết</p>
            <a href="index.php?xem=giohang&id=$sanpham[MaSP]"><input class="buttonmuahang" type="submit" name="giohang" id="giohang" value="Mua hàng" /></a>
            </a>
        </li>       
            
SANPHAM;

        return $html;
    }

    public function drawNamSPCungLoaiHeader() 
    {
        $html =<<<SANPHAMH
        <p style="text-align:center;padding:10px">Sản phẩm cùng Loại</p>
            <div class="sanphamall">
                <ul>
SANPHAMH;
        return $html;
    }

    public function drawNamSPCungLoaiFooter() 
    {
        $html =<<<SANPHAMF
         </ul> 
        </div>
SANPHAMF;
        return $html;
    }
// Giống mấy cái ở trên 1 hàm lấy dữ liệu 1 hàm vẽ dữ liệu, 2 hàm header và footer
//top 5 san pham cung nha san xuat
    public function NamSanPhamCungNSX($id_sanpham)
    {
        $spcl=$this->NhungSanPhamCungNSX($id_sanpham);

        $sql = "select * from SanPham where NhaSanXuatID ='$spcl[NhaSanXuatID]' and MaSP<>'$id_sanpham' limit 5";
        
        $run =mysqli_query($this->_conn, $sql);

        $result = [];
        while($row = mysqli_fetch_array($run))
        {
            array_push($result, $row);
        }

        return $result;
    }
    public function drawNamSanPhamCungNSX($sanpham)
    {
        $hinhanh=$this->HinhAnh($sanpham['MaSP']);
        $html =<<<SANPHAM
        <li>
            <a href="index.php?xem=chitietsanpham&id=$sanpham[MaSP]">
            <img src=$hinhanh width='100px' height='150'>
            <p class="Ten">$sanpham[TenSP]</p>
            <p style="color:#F00;"><del>$sanpham[GiaGoc]</del></p>
            <p style="color:#F00;">$sanpham[Gia]</p>
            <p style="color:#4CAF50;text-align:center">Chi tiết</p>
            <a href="index.php?xem=giohang&id=$sanpham[MaSP]"><input class="buttonmuahang" type="submit" name="giohang" id="giohang" value="Mua hàng" /></a>
            </a>
        </li>       
            
SANPHAM;

        return $html;
    }

    public function drawNamSPCungNSXHeader() 
    {
        $html =<<<SANPHAMH
        <p style="text-align:center;padding:10px">Sản phẩm cùng Nhà Sản Xuất</p>
            <div class="sanphamall">
                <ul>
SANPHAMH;
        return $html;
    }

    public function drawNamSPCungNSXFooter() 
    {
        $html =<<<SANPHAMF
         </ul> 
        </div>
SANPHAMF;
        return $html;
    }
// Cảm giác làm xong 2 hàm này hơi thưa, nhưng thôi chạy được thì để đó cho nó lành
//Nó là cái hàm lấy tất cả sản phẩm cùng loại
    public function NhungSanPhamCungLoai($id_sanpham)
    {
        $sql="select LoaiSP from sanpham where MaSP='$id_sanpham'";
        $run=mysqli_query($this->_conn,$sql);
        $row = mysqli_fetch_array($run);
        return $row;
    }
// Cảm giác làm xong 2 hàm này hơi thưa, nhưng thôi chạy được thì để đó cho nó lành
//Nó là cái hàm lấy tất cả sản phẩm cùng loại
    public function NhungSanPhamCungNSX($id_sanpham)
    {
        $sql="select NhaSanXuatID from sanpham where MaSP='$id_sanpham'";
        $run=mysqli_query($this->_conn,$sql);
        $row = mysqli_fetch_array($run);
        return $row;
    }
}