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

                    foreach ($listSanpham as $sp) {
                        echo $sanpham->drawTatCaSanPham($sp);
                    }

                }
                elseif($tam=='chitietsanpham')
                {
                    include('modules/right/SanPham.php');
                    $sanpham = new SanPham($conn);
                    $sp = $sanpham->ChiTietSanPham($id);
                    
                    echo $sanpham->drawChiTiestSPHeader();
                    echo $sanpham->drawChiTietSP($sp);
                    echo $sanpham->drawChiTietSPFooter();
                    // var_dump($sp);

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


                } else
                {
                    include('modules/right/tatcasanpham.php');
                }
            ?>
        </div>  
            
</div>
        <div class="clear"></div>