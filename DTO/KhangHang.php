<?php
  class KhachHang
  {
     var TenKH;
     var Email;
     var Password;
     var SoDienThoai;
     var DiaChi;
     var HinhAnh;
     var Quyen;
      public function __construct()
      {
          this->TenKH="";
          this->Password="";
          this->Email="";
          this->SoDienThoai="";
          this->DiaChi="";
          this->HinhAnh="";
          this->Quyen=0;          
      }

  }
?>
