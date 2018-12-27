
<div class="content">
        <!-- Css sẽ định dạng khung của phần này -->
        <div class="left">
            <?php
            //Xuất các danh sách loại sản phẩn và NSX vào phần bên trái của trang web
                include('modules/left/danhsach.php');
            ?>
        </div> 
<!-- Nơi chốt chặn và xử lí các đường link -->
        <div class="right">
            <?php
                //isset là kiểm tra đã tồn tại hay chưa
                //$_GET là lấy giá trị sau phần xem= và isd= trong đường link
                if(isset($_GET['xem']) && isset($_GET['id']))
                {
                    //gán nó cho 1 biến để dễ nhớ, dễ xử lí
                    $tam=$_GET['xem'];
                    $id=$_GET['id'];
                }
                else
                {
                    //nếu chưa có tạm thời gán nó bằng 1 cái giá trị tạm thời
                    $tam = '';
                    $id = 0;
                }
                //đường link nào có xem=tatcasanpham sẽ được xử lí ngay đây
                 if ($tam == 'tatcasanpham')
                {
                    //chạy cái file xử lí sản phẩm lên
                    include('modules/right/SanPham.php');
                    //Tạo 1 cái giá trị con trong cái class mình đã tọa trong phần xử lí
                    $sanpham = new SanPham($conn);
                    //list... là chứa hết tất cả các gia trị có trong phầntatCaSanPham
                    $listSanpham = $sanpham->TatCaSanPham();
                    //Phần này ko mấy quan trọng nó và footer chỉ xử lí phần nhiều giao diện
                    echo $sanpham->drawTatCaSanPhamHeader();
                    //Giống vòng lập gán giống sql dài quá gán ngắn cho tiện :D
                    foreach ($listSanpham as $sp) {
                      
                        //hàm draw là hàm để vẽ ra cái giá trị mình đã lấy ra lúc trước
                        echo $sanpham->drawTatCaSanPham($sp);
                       
                    }
                    //Như đã nói ở trên này khoogn mấy quan trọng
                    echo $sanpham->drawTatCaSanPhamFooter();
                }
                //Các phần còn lại tương tự như ở trên thôi
                elseif($tam=='chitietsanpham')
                {
                    include('modules/right/SanPham.php');
                    $sanpham = new SanPham($conn);
                    $sp = $sanpham->ChiTietSanPham($id);
                    
                    echo $sanpham->drawChiTiestSPHeader();
                    echo $sanpham->drawChiTietSP($sp);
                    echo $sanpham->drawChiTietSPFooter();
                    
                    $listSanpham = $sanpham->NamSanPhamCungLoai($id);
                    echo $sanpham->drawNamSPCungLoaiHeader();
                    
                    foreach ($listSanpham as $spcl) {
                        echo $sanpham->drawNamSanPhamCungLoai($spcl);
                    }

                    echo $sanpham->drawNamSPCungLoaiFooter();
                    $listSanpham2 = $sanpham->NamSanPhamCungNSX($id);
                    echo $sanpham->drawNamSPCungNSXHeader();
                    
                    foreach ($listSanpham2 as $spcnsx) {
                        echo $sanpham->drawNamSanPhamCungNSX($spcnsx);
                    }

                    echo $sanpham->drawNamSPCungNSXFooter();

                }
                else if ($tam == 'sanphamcungloai')
                {
                    
                    include('modules/right/SanPham.php');
                    $sanpham = new SanPham($conn);
                    
                    $listSanpham = $sanpham->SanPhamCungLoai($id);

                    echo $sanpham->drawSPCungLoaiHeader();
                    
                    foreach ($listSanpham as $sp) {
                        echo $sanpham->drawSanPhamCungLoai($sp);
                    }

                    echo $sanpham->drawSPCungLoaiFooter();


                }
                else if ($tam == 'sanphamcungnsx')
                {
                    
                    include('modules/right/SanPham.php');
                    $sanpham = new SanPham($conn);
                    
                    $listSanpham = $sanpham->SanPhamCungNSX($id);

                    echo $sanpham->drawSPCungNSXHeader();
                    
                    foreach ($listSanpham as $sp) {
                        echo $sanpham->drawSanPhamCungNSX($sp);
                    }

                    echo $sanpham->drawSPCungNSXFooter();

                }
                else if($tam=='top10new')
                {
                    include('modules/right/SanPham.php');
                    $sanpham = new SanPham($conn);
                    
                    $listSanpham = $sanpham->Top10New();

                    echo $sanpham->drawTop10NewHeader();

                    foreach ($listSanpham as $sp) {
                      
                        echo $sanpham->drawTop10New($sp);
                       
                    }
                    echo $sanpham->drawTop10NewFooter();
                }
                else if($tam=='top10selling')
                {
                    include('modules/right/SanPham.php');
                    $sanpham = new SanPham($conn);
                    
                    $listSanpham = $sanpham->Top10NSelling();

                    echo $sanpham->drawTop10NSellingHeader();

                    foreach ($listSanpham as $sp) {
                      
                        echo $sanpham->drawTop10NSelling($sp);
                       
                    }
                    echo $sanpham->drawTop10NSellingFooter();
                } 
                else if($tam=='top10view')
                {
                    include('modules/right/SanPham.php');
                    $sanpham = new SanPham($conn);
                    
                    $listSanpham = $sanpham->Top10View();

                    echo $sanpham->drawTop10ViewHeader();

                    foreach ($listSanpham as $sp) {
                      
                        echo $sanpham->drawTop10View($sp);
                       
                    }
                    echo $sanpham->drawTop10ViewFooter();
                }
                else if($tam=='thongtinnguoidung')
                {
                    include('modules/right/TTND.php');

                }
                else if($tam=='dangnhaptk')
                {
                    include('modules/right/dangnhap.php');
                }
                else if($tam=='dangkitk')
                {
                    include('modules/right/dangki.php');
                }
                //Này đi vào không phải là đường link mà là button nên sẽ kiểm tra hơi khác so với mấy cái còn lại
                else if(isset($_POST['search']))
                {
                    include('modules/right/search.php');
                }
                else if($tam=='giohang')
                {
                    include('modules/right/giohang.php');
                }
                else if($tam=='thanhtoan')
                {
                    include('modules/right/thanhtoan.php');
                }
                else if($tam=='doimk')
                {
                    include('modules/right/DoiMK.php');
                }
                else if($tam=='doittnd')
                {
                    include('modules/right/DoiTTND.php');
                }
                else if($tam=='quanliadmin')
                {
                    header('location:admincp');
                }
                else if($tam=='thongbao')
                {
                    include('modules/right/thongbao.php');
                }
                else
                {
                    include('modules/right/trangchu.php');
                }
            ?>
        </div>  
            
</div>
        <div class="clear"></div>