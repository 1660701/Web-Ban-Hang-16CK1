<div class="content">
        <div class="left">
            <?php
                include('modules/left/danhsach.php');
            ?>
        </div> 

        <div class="right">
            <?php
                if(isset($_GET['xem']) && isset($_GET['id']))
                {
                    $tam=$_GET['xem'];
                    $id=$_GET['id'];
                }
                else
                {
                    $tam = '';
                    $id = 0;
                }

                 if ($tam == 'tatcasanpham')
                {
                    
                    include('modules/right/SanPham.php');
                    $sanpham = new SanPham($conn);
                    
                    $listSanpham = $sanpham->TatCaSanPham();

                    echo $sanpham->drawTatCaSanPhamHeader();

                    foreach ($listSanpham as $sp) {
                      
                        echo $sanpham->drawTatCaSanPham($sp);
                       
                    }
                    echo $sanpham->drawTatCaSanPhamFooter();
                }
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
                elseif($tam=='giohang')
                {
                    
                    include('modules/right/GioHang.php');

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
                    $nguoidung = new NguoiDung($conn);
                    $nd=$nguoidung->TTND($id);

                    echo $nguoidung->drawTTND($nd);
                }
                else if($tam=='dangnhaptk')
                {
                    include('modules/right/dangnhap.php');
                }
                else if(isset($_POST['search']))
                {
                    include('modules/right/search.php');
                }
                else if(isset($_POST['DatHang']))
                {
                    include('modules/right/thanhtoan.php');
                }
                else if($tam=='dangkitk')
                {
                    include('modules/right/dangki.php');
                }
                else
                {
                    include('modules/right/trangchu.php');
                }
            ?>
        </div>  
            
</div>
        <div class="clear"></div>